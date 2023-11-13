<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Reaction;
use App\Models\Comment;
use App\Models\IdeaActivity;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ideas = DB::table('ideas')
            ->leftJoin('users', 'users.id', '=', 'ideas.staffID')
            ->leftJoin('reactions', 'reactions.id', '=', 'ideas.reactionID')
            ->select(
                'ideas.id AS ideasID',
                'users.name AS name',
                'ideas.created_at AS createdDate',
                'ideas.title as title',
                'ideas.idealDetails AS IdealDetails',
                'reactions.thumbsUP AS thumbUps',
                'reactions.thumbsDown AS thumbsDown'
            )
            ->orderByDesc('ideasID')
            ->paginate(5);

        return view('home', compact('ideas'));
    }
    
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
