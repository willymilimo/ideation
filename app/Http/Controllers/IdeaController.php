<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Reaction;
use App\Models\Comment;
use App\Models\IdeaActivity;
use App\Models\User;
use App\Models\Document;
use App\Models\IdeaClosuredate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;



class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

        $idea_list = DB::table('ideas')
            ->leftJoin('users', 'users.id', '=', 'ideas.staffID')
            ->leftJoin('reactions', 'reactions.id', '=', 'ideas.reactiondID')
            ->select(
                'ideas.id AS ideasID',
                'users.name AS name',
                'ideas.created_at AS createdDate',
                'ideas.title as title',
                'ideas.idealDetails AS IdealDetails',
                'reactions.thumbsUP AS thumbUps',
                'reactions.thumbsDown AS thumbsDown'
            )
            ->paginate(3);
        
        return view('ideas.index', compact('idea_list'));
    }

    public function paginate($items, $perPage = 4, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Department::all();
        $idea_category = Category::all();
        return view('ideas.create', compact('idea_category', 'departments'));
    }

    public function fileUpload($req)
    {

        $fileModel = new Document;
     
        dd($req);
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->documentURL = '/storage/' . $filePath;
            $fileModel->save();

            return  $fileName;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'title' => ['required'],
            'idea_details' => ['required'],
            'department_id' => ['required'],
            'ideaCategory_id' => ['required'],
            'anonymous_id' => ['required'],
            'terms_condition' => ['required'],
            'file'=> 'mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);
        $staffId = auth()->user()->id;
        $department = Department::find($validatedData['department_id']);
        $get_all_closure_date = IdeaClosuredate::find(1);

        $currentDateTime = date('Y-m-d');
        if ($get_all_closure_date->idea_closuredate > $currentDateTime) {

            $idea_id = Idea::create([
                'staffId' => $staffId,
                'title' => $validatedData['title'],
                'status' => $validatedData['anonymous_id'],
                'categoryID' => $validatedData['ideaCategory_id'],
                'departmentID' => $validatedData['department_id'],
                'idealDetails' => $validatedData['idea_details'],
            ]);
            
          
            $this->createReactions($idea_id->id);
            if($validatedData['file'] != null){
                $files = $request->all();
                $this->fileUpload($files);
            }
            $email = User::findOrFail($department->qaCoodinatorID);
            $message = 'Dear '.$email->names.' An Idea has been submited for your Department';
            $this->notifyUser($message, $email->email);

            return redirect('ideas')->with('Succesefuly submited an idea');
        } else {
            return redirect('ideas/create')->with('danger', 'Submission date closed on ' . $department->closuredate);
        }
    }

    public function notifyUser($message, $userEmail)
    {
        $details = [
            'title' => 'Mail from Eweb16 40 University',
            'body' => $message
        ];
        \Mail::to($userEmail)->send(new \App\Mail\MyTestMail($details));

        dd('Email sent ', $userEmail);
    }

    protected function createReactions($id)
    {

        $reactions_id = Reaction::create([
            'ideaID' => $id
        ]);

        $ideas =  Idea::find($id);
        $ideas->reactiondID = $reactions_id->id;
        $ideas->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $comment = Idea::find($id);
        return view('idea.show', compact('$comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function thumbUp($id)
    {

        $idea = Idea::find($id);
        $user_id = Auth::user()->id;
        $like = IdeaActivity::where(
            'ideaID',
            '=',
            $id,
            'AND',
            'user_id',
            '=',
            $user_id
        )->get();
        if (!is_null($idea)) {
            if ($like->isEmpty()) {

                IdeaActivity::create([
                    'user_id' => $user_id,
                    'ideaID' => $id,
                    'action' => 'thumbsUp Added'

                ]);
                $idea_reaction = Reaction::where('ideaID', $id)->first();
                $idea_reaction->thumbsUp = $idea_reaction->thumbsUp + 1;
                $idea_reaction->save();
                return redirect('ideas')->with('success', 'Successfully liked the idea');
            }
        }
        return redirect('ideas')->with('danger', ' already Reacted to ' . $idea->title . ' idea');
    }


    public function thumbDown($id)
    {
        $idea = Idea::find($id);
        $user_id = Auth::user()->id;
        $like = IdeaActivity::where(
            'ideaID',
            '=',
            $id,
            'AND',
            'user_id',
            '=',
            $user_id
        )->get();
        if (!is_null($idea)) {
            if ($like->isEmpty()) {

                IdeaActivity::create([
                    'user_id' => $user_id,
                    'ideaID' => $id,
                    'action' => 'thumbsDown added'
                ]);
                $idea_reaction = Reaction::where('ideaID', $id)->first();
                $idea_reaction->thumbsDown = $idea_reaction->thumbsDown + 1;
                $idea_reaction->save();
                return redirect('ideas')->with('success', 'dislike  the idea');
            }
        }
        return redirect('ideas')->with('danger', ' already Reacted to ' . $idea->title . ' idea');
    }

    public function comments($id)
    {

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
                LEFT JOIN reactions rt ON rt.id = ideas.reactiondID
                WHERE ideas.id = ?";

        $idea_list = DB::select($sql, [$id]);

        $comment_sql = "SELECT cmmt.id AS cmmtID,
                               cmmt.commentDetails,
                               usr.name AS name,
                            cmmt.created_at AS createdDate,
                               ideas.title AS title,
                        CASE
                            WHEN cmmt.status = 1 THEN 'NON'
                            WHEN cmmt.status = 2 THEN 'ANON'
                            ELSE 'NON'
                        end AS status
                        FROM   comments cmmt
                            LEFT JOIN users usr
                                    ON usr.id = cmmt.userid
                            LEFT JOIN ideas ideas
                                    ON ideas.id = cmmt.ideaid
                        WHERE  ideas.id = ?";

        $comments = DB::select($comment_sql, [$id]);


        return view('comments.index', compact('idea_list', 'comments'));
    }

    public function commentStore(Request $request)
    {
        $validatedData = $request->validate([
            'commentDetails' => ['required'],
            'ideaID' => ['required']
        ]);
        $validatedData['userID'] = auth()->user()->id;
        Comment::create($validatedData);
        return redirect('comment/' . $validatedData['ideaID'])->with(['success', 'comment added']);
    }

    public function setClosureDate()
    {
        
        return view('ideas.closuredate');
    }
    public function setClosureDateStore(Request $request)
    {
        // dd($request->all());
        $data = $this->validate($request, [
            'idea_closuredate' => ['required', 'date', 'date_format:Y-m-d', 'after:yesterday'],
            'comment_closuredate' => ['required', 'date', 'date_format:Y-m-d', 'after:yesterday'],
            'academic_Year' => ['required'],

        ]);
        // dd($data);


        IdeaClosuredate::create($data);
        
        return redirect('departments')->with('success', 'Successfully addded a closure date');
    }


    
}
