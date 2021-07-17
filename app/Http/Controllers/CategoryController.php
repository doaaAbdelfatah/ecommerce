<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::get();
        return view("categories.index" ,["categories"=>$cats]);
    }
    public function all()
    {
        $cats = Category::get();
        return  $cats;//view("categories.index" ,["categories"=>$cats]);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // validation 
        $request->validate([
            "name"=>"required|alpha",
            "comments"=>"required|max:1000"
        ]);
        $cat = new Category();
        $cat->cat_name = $request->name;
        $cat->comments = $request->comments;
        $cat->save();
        return redirect()->route("category.index");

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
        // $cat = Category::find($id);
        $cat = Category::findorFail($id);
        // dd($cat);
        $cat->delete();

        // return redirect("/category");
        return redirect()->route("category.index");

    }
}
