<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy("name","ASC")->get();
        $subcategories=SubCategory::latest()->get();
        return view("admin.subcategories.index",compact("subcategories","categories"));
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
        $request->validate([
            "category"=>"required",
            "subCategoryName"=>"required",
        ]);
        SubCategory::create([
            "category_id"=>$request->category,
            "name"=>$request->subCategoryName,
        ]);
        return redirect()->route("subcategories.index")->with("success","SubCategory Created Successfully!");
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
        $categories=Category::orderBy("name","ASC")->get();
        $subcategory=SubCategory::findOrFail($id);
        return view("admin.subcategories.edit",compact("subcategory","categories"));
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
            "category"=>"required",
            "subCategoryName"=>"required",
        ]);
        SubCategory::findOrFail($id)->update([
            "category_id"=>$request->category,
            "name"=>$request->subCategoryName,
        ]);
        return redirect()->route("subcategories.index")->with("success","SubCategory Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::findOrFail($id)->delete();
        return redirect()->route("subcategories.index")->with("success","SubCategory Deleted Successfully!");
    }
    public function getSubCategories($categoryId)
    {
        $subcategories=SubCategory::where("category_id",$categoryId)->orderBy("name","ASC")->get();
        return json_encode($subcategories);
    }

}
