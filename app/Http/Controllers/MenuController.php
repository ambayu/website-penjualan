<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremenuRequest;
use App\Http\Requests\UpdatemenuRequest;
use App\Models\category;
use App\Models\Menu;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.add_menu', [
            "title" => "Add Menu",
            "post" => Menu::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create_add_menu', [
            "title" => "Add Menu",
            'categories' => category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremenuRequest $request)
    {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'foto' => 'image',
            'slug' => 'required|unique:menus',
            'category_id' => 'required|max:255',
            'harga' => 'required|max:255',
            'body' => '',

        ]);
        $imageName = time() . '.' . $request->foto->extension();

        if ($request->file('foto')) {
            $path = '/home/u290583795/domains/pateenxfatboyfactory.com/public_html/post-image/';
            $validateData['foto'] = $request->file('foto')->move($path, $imageName);
            $validateData['foto'] = $imageName;
        }

        Menu::create($validateData);
        return redirect('/add_menu/create')->with('success', 'New Menu Has Been Add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(menu $menu)
    {
        return view('crud.edit_add_menu', [
            "title" => "Add Category",
            'categories' => category::all(),
            'post' => $menu,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemenuRequest  $request
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemenuRequest $request, menu $menu)
    {
        $rules = [
            'category_id' => 'required',
            'harga' => 'required|integer',
            'foto' => 'image',

        ];
      
        if ($request->slug != $menu->slug) {
            $rules['slug'] = 'required|unique:menus,slug';
        }
        if ($request->name != $menu->name) {
            $rules['name'] = 'required|unique:menus,name';
        }

        $imageName = time() . '.' . $request->foto->extension();

        $validateData = $request->validate($rules);

        if ($request->file('foto')) {

            $path = '/home/u290583795/domains/pateenxfatboyfactory.com/public_html/post-image/';
            $validateData['foto'] = $request->file('foto')->move($path, $imageName);
            $validateData['foto'] = $imageName;

        }

        Menu::where('id', $menu->id)->update($validateData);

        return redirect('/add_menu')->with('success', 'Menu Has Been Change');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        return $menu;
        // Menu::destroy($menu->id);
        // return redirect('/add_menu')->with('success', 'Menu Has Been Delete');

    }

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Menu::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);

    }
}
