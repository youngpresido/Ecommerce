<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Session;
class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('admin.category');
    }
    public function create()
    {
        return view('admin.addCategory');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required|string",
            "decription"=>"required"
        ]);



        $category=new Category;
        $category->name=$request->name;
        $category->description=$request->description;
        if($category->save())
        {
            Session::flash("msg","Successfully Saved");
            return redirect()->back();
        }else{
            Session::flash("error","Opps an error occurred");
            return redirect()->back();
        }
    }
    public function show($id)
    {
        $category=Category::whereId($id)->first();
        return $category;
    }
    public function saveOne(Request $request,$id)
    {
        $category=Category::whereId($id)->first();
        $category->name=$request->name;
        $category->description=$request->description;
        if($category->save())
        {
            Session::flash("msg","Successfully edited");
            return redirect()->back();
        }else{
            Session::flash("error","Opps an error occurred");
            return redirect()->back();
        }

    }
    public function edit($id)
    {
        $category=Category::whereId($id)->first();
        return $category;
    }
    public function destroy($id)
    {
        $category=Category::whereId($id)->first();
        if($category->delete())
        {
            Session::flash("msg","Successfully deleted");
            return redirect()->back();
        }else{
            Session::flash("error","Opps an error occurred");
            return redirect()->back();
        }
        // return $category;
    }
}
