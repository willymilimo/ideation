<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use DB;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qa_coordinators = DB::table('users')->where('roleID', '=', '2')->get();
        return view('departments.create', compact('qa_coordinators'));
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
            'departmentName' => ['required', 'Min:2', 'Max:200'],
            'qaCoodinatorID' => ['required']
        ]);

        Department::create([
            'departmentName' => $request->get('departmentName'),
            'qaCoodinatorID' => $request->get('qaCoodinatorID')
        ]);

        return redirect('departments')->with('success', 'Successefully added a department');
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

    public function viewDepartment()
    {
        $users = auth()->user->id;

        return view('departments.view');
    }
}
