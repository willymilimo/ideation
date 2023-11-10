<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'categoryName' => ['required', 'Min:3', 'Max:100'],
            'categoryDescriptions' => ['required', 'Min:3', 'Max:200']
        ]);

        Category::create([
            'categoryName' => $request->get('categoryName'),
            'categoryDescriptions' => $request->get('categoryDescriptions'),
        ]);

        return redirect('categories')->with('success', 'successfully added a category');
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
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
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

        $request->validate(([
            'categoryName' => ['required', 'Min:2', 'Max:200'],
            'categoryDescriptions' => ['required', 'Min:2', 'Max:255']
        ]));

        $category = Category::findOrFail($id);

        if (!is_null($category)) {
            $category->categoryName = $request['categoryName'];
            $category->categoryDescriptions = $request['categoryDescriptions'];
            $category->save();
        }
        return redirect('categories')->with('success', 'Successfully Modified a category');
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
}
