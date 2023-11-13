<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return view('reports.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function ideasPerDept()
    {
        $sql = "SELECT  dpt.departmentName, departmentID, count(*) as Number_of_ideas
                FROM ideas 
                LEFT JOIN departments dpt ON  ideas.departmentID = dpt.id
                GROUP BY  departmentID;";
        $ideas_per_dept = DB::select($sql);

        return view('reports.ideas_per_dept', compact('ideas_per_dept'));
    }

    public function ideasPerCategory()
    {
        $sql = "SELECT  c.categoryName, c.categoryDescriptions, count(*) as ideas
                FROM ideas i
                LEFT JOIN categories c ON  i.categoryID = c.id
                GROUP BY  categoryName, categoryDescriptions;";
        $ideas_per_category = DB::select($sql);

        return view('reports.ideas_per_category', compact('ideas_per_category'));
    }

    // public function ideaPercentage()
    // {
    //     return view('reports.ideapercentage');
    // }

    public function getTotalideas()
    {

        $sql = "SELECT  dpt.departmentName, count(*) as Number_of_ideas
                FROM ideas 
                LEFT JOIN departments dpt ON  ideas.departmentID = dpt.id
                GROUP BY  departmentID;";
        $ideas_per_dept = DB::select($sql);
        // dd(response()->json($ideas_per_dept));
        return response()->json($ideas_per_dept);
    }
}
