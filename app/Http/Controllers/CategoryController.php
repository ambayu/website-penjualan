<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add_category', [
        "title" => "Add Category",
        "post" => Category::all(),
]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('crud.create_add_category', [
        "title" => "Add Category",
        'categories' => category::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoryRequest $request)
    {
            $validateData = $request->validate([
            'name' => 'required|max:255|unique:categories,name',
            'slug' => 'required|unique:categories',
            

        ]);

        Category::create($validateData);
        return redirect('/add_category/create')->with('success', 'New Category Has Been Add');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $add_category)
    {
      return view('crud.edit_add_category', [
            "title" => "Add Category",
            'categories' => category::all(),
            'post'  => $add_category
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, category $add_category)
    {
            $rules['']='';
          if($request->slug != $add_category->slug){
              $rules['slug'] = 'required|unique:categories,slug';
          }
          if ($request->name != $add_category->name) {
         $rules['name'] = 'required|unique:categories,name';
        }

        $validateData = $request->validate($rules);

        Category::where('id',$add_category->id)->update($validateData);

        return redirect('/add_category')->with('success', 'Category Has Been Change');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $add_category)
    {
   
        
      category::destroy($add_category->id);
     return redirect('/add_category')->with('success', 'Category Has Been Delete');

    }
}
