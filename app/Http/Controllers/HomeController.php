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
          //
          $sql = "SELECT 
          ideas.id as ideasID, 
          usr.name as name, 
          ideas.created_at as createdDate, 
          ideas.title as title, 
          ideas.idealDetails as IdealDetails,
          rt.thumbsUP as thumbUps, 
          rt.thumbsDown as thumbsDown 
      FROM ideas ideas 
      LEFT JOIN users usr ON usr.id = ideas.staffID 
      LEFT JOIN reactions rt ON rt.id = ideas.reactiondID";

        $data = DB::select($sql);
        $idea_list = $this->paginate($data);

        return view('home', compact('idea_list'));
    }
    
    public function paginate($items, $perPage = 4, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
