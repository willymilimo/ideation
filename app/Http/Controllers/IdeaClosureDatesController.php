<?php

namespace App\Http\Controllers;

use App\Models\IdeaClosuredate;
use Illuminate\Http\Request;

class IdeaClosureDatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $closureDates = IdeaClosuredate::all();
        return view("closureDates.index", compact("closureDates"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("closureDates.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'idea_closuredate' => 'date|after:now',
            'comment_closuredate' => 'date|after:now',
            'academic_Year' => 'required|string|unique:idea_closuredates',
        ]);

        IdeaClosuredate::create([
            'idea_closuredate' => $request->get('idea_closuredate'),
            'comment_closuredate' => $request->get('comment_closuredate'),
            'academic_Year' => $request->get('academic_Year'),
        ]);

        return redirect('closureDates')->with('success', 'successfully added a Closure Date');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $closureDate = IdeaClosuredate::findOrFail($id);

        return view('closureDates.show', compact('closureDate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $closureDate = IdeaClosuredate::findOrFail($id);

        return view('closureDates.edit', compact('closureDate'));
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
        $this->validate($request, [
            'idea_closuredate' => 'date|after:now',
            'comment_closuredate' => 'date|after:now',
            'academic_Year' => 'required|string|unique:idea_closuredates',
        ]);

        $closureDate = IdeaClosuredate::findOrFail($id);

        if (!is_null($closureDate)) {
            $closureDate->idea_closuredate = $request['idea_closuredate'];
            $closureDate->comment_closuredate = $request['comment_closuredate'];
            $closureDate->academic_Year = $request['academic_Year'];
            $closureDate->save();
        }
        return redirect('closureDates')->with('success', 'Successfully Modified a Closure Date');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $closureDate = IdeaClosuredate::find($id)->delete();

        if (is_null($closureDate)) {
            return redirect('closureDates')->with('error', 'Failed to delete a Closure Date');
        } else {
            return redirect('closureDates')->with('success', 'Successfully deleted a Closure Date');
        }
    }
}
