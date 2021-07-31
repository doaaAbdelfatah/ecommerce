<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


    // function __construct()
    // {
    //     $this->middleware("age");
    // }
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
            "comments"=>"nullable|max:1000"
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

    public function search(Request $request){
        // dd($request->search);

        // $rslt = Category::where("id" ,10)->first();
        // $rslt = Category::where("id" ,10)->get();
        // $rslt = Category::where("id" ,"!=" ,10)->get();
        // $rslt = Category::where("id" ,">" ,9)->get();
        // $rslt = Category::whereBetween("id" ,[8,10])->get();
        // $rslt = Category::whereIn("id" ,[8,11 ,9])->get();
        // $rslt = Category::whereNotIn("id" ,[8,11 ,9])->get();
        // $rslt = Category::whereNull("comments" )->orWhere("id",9)->get();
        // $rslt = Category::whereNull("comments" )->get();
        // $rslt = DB::table("categories")->whereNull("comments" )->get();
        // dd($rslt->get(2));
      
        // $rslt = Category::where("cat_name" ,"like" ,$request->search."%" )->count();
        // dd($rslt);

        // $rslt = Category::pluck("cat_name" ,"id" );
        // $rslt = Category::min("id" );
        // dd($rslt);

        $rslt = Category::where("cat_name" ,"like" ,$request->search."%" )->get();
        return view("categories.index" ,["categories"=>$rslt]);

//   dd($rslt);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::findorFail($id);
        // dd($cat);
        return view("categories.edit" , ["category"=>$cat]);
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
        $request->validate([
            "name"=>"required|alpha",
            "comments"=>"nullable|max:1000"
        ]);
        
        $cat = Category::findorFail($id);
        $cat->cat_name = $request->name;
        $cat->comments = $request->comments;
        $cat->save();
        return redirect()->route("category.index");

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
