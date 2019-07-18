<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('admin.products');
    }
    public function create()
    {
        return view('admin.product-add');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required|string",
            "decription"=>"required"
        ]);



        $Product=new Product;
        $Product->name=$request->name;
        $Product->description=$request->description;
        if($Product->save())
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
        $Product=Product::whereId($id)->first();
        return $Product;
    }
    public function saveOne(Request $request,$id)
    {
        $Product=Product::whereId($id)->first();
        $Product->name=$request->name;
        $Product->description=$request->description;
        if($Product->save())
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
        $Product=Product::whereId($id)->first();
        return $Product;
    }
    public function destroy($id)
    {
        $Product=Product::whereId($id)->first();
        if($Product->delete())
        {
            Session::flash("msg","Successfully deleted");
            return redirect()->back();
        }else{
            Session::flash("error","Opps an error occurred");
            return redirect()->back();
        }
        // return $Product;
    }
}
