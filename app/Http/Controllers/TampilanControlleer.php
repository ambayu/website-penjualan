<?php

namespace App\Http\Controllers;

use App\Models\Bestfood;
use App\Models\Biodata;
use App\Models\category;
use App\Models\dashboard;
use App\Models\ourblog;
use App\Models\slidephoto;
use App\Models\testimoni;

use Illuminate\Http\Request;

class TampilanControlleer extends Controller
{
    
     public function index()
    {
        return view('/admin/tampilan', [
          "title" => "Setting Tampilan",
        ]);
    }

         public function ourblog()
    {
        return view('/setting/ourblog', [
         "title" => "Setting Tampilan",
         "categories" =>category::all(),
         "ourblog" => ourblog::all()
    
        ]);

    }
          public function slidepoto()
    {
        return view('/setting/slidepoto', [
         "title" => "Setting Tampilan",
         "categories" =>category::all(),
         "ourblog" => slidephoto::all()
    
        ]);

    }

    public function dashboard()
    {
        return view('/setting/dashboard', [
         "title" => "Setting Tampilan",
         "categories" =>category::all(),
         "post" => dashboard::first()
    
        ]);

    }
    

    

          public function testimoni()
    {
        return view('/setting/testimoni', [
         "title" => "Setting Tampilan",
         "categories" =>category::all(),
         "ourblog" => testimoni::all()
    
        ]);

    }

    public function bestfood()
    {
        return view('/setting/bestfood', [
         "title" => "Setting Tampilan",
         "categories" =>category::all(),
         "ourblog" => Bestfood::all()
    
        ]);

    }

    public function biodata()
    {
        return view('/setting/biodata', [
         "title" => "Setting Tampilan",
         "categories" =>category::all(),
         "post" =>Biodata::first(),
         
    
        ]);

    }

    public function ourblogsave(Request $request){
         $validateData = $request->validate([
            'name' => ['required'],
            'category_id' => ['required'],
            'body' => ['required'],
            'foto' => 'image|required',
        ]);

         $imageName = time() . '.' . $request->foto->extension();
        if ($request->file('foto')) {
        $path = '/home/u290583795/domains/pateenxfatboyfactory.com/public_html/post-image/';
        $validateData['foto'] = $request->file('foto')->move($path, $imageName);
        $validateData['foto'] = $imageName;

        }

        ourblog::create($validateData);
        
        return redirect('/tampilan/ourblog')->with('success', 'New Menu Has Been Add');


    }

     public function ourblogedit(Request $request){
        
         $validateData = $request->validate([
            'name' => ['required'],
            'category_id' => ['required'],
            'body' => ['required'],
            'foto' => 'image',
        ]);

        if ($request->file('foto')) {
    $imageName = time() . '.' . $request->foto->extension();
    $path = '/home/u290583795/domains/pateenxfatboyfactory.com/public_html/post-image/';
    $validateData['foto'] = $request->file('foto')->move($path, $imageName);
    $validateData['foto'] = $imageName;

}


        ourblog::where('id', $request->id)->update($validateData);

        return redirect('/tampilan/ourblog')->with('success', 'Menu Has Been Change');

    }
    
         public function ourblogdelete(ourblog $ourblogdelete, $alt){

          
         ourblog::destroy($alt);
       return redirect('/tampilan/ourblog')->with('success', 'Menu Has Been Delete');

        }


        // slidepoto

         public function slidepotosave(Request $request){
         $validateData = $request->validate([
            'name' => ['required'],
         
            'body' => ['required'],
            'foto' => 'image|required',
        ]);
        $imageName = time() . '.' . $request->foto->extension();
if ($request->file('foto')) {
    $path = '/home/u290583795/domains/pateenxfatboyfactory.com/public_html/post-image/';
    $validateData['foto'] = $request->file('foto')->move($path, $imageName);
    $validateData['foto'] = $imageName;

}

        slidephoto::create($validateData);

       
        
        return redirect('/tampilan/slidepoto')->with('success', 'New Menu Has Been Add');


    }

     public function slidepotoedit(Request $request){
        
         $validateData = $request->validate([
            'name' => ['required'],
          
            'body' => ['required'],
            'foto' => 'image',
        ]);

        if ($request->file('foto')) {
    $imageName = time() . '.' . $request->foto->extension();
    $path = '/home/u290583795/domains/pateenxfatboyfactory.com/public_html/post-image/';
    $validateData['foto'] = $request->file('foto')->move($path, $imageName);
    $validateData['foto'] = $imageName;

}

        slidephoto::where('id', $request->id)->update($validateData);

        return redirect('/tampilan/slidepoto')->with('success', 'Menu Has Been Change');

    }
    
         public function slidepotodelete(ourblog $ourblogdelete, $alt){

          
         slidephoto::destroy($alt);
       return redirect('/tampilan/slidepoto')->with('success', 'Menu Has Been Delete');

        }

        // testimoni

          public function testimonisave(Request $request){
         $validateData = $request->validate([
            'name' => ['required'],
         
            'body' => ['required'],
            'foto' => 'image|required',
        ]);

        $imageName = time() . '.' . $request->foto->extension();
if ($request->file('foto')) {
    $path = '/home/u290583795/domains/pateenxfatboyfactory.com/public_html/post-image/';
    $validateData['foto'] = $request->file('foto')->move($path, $imageName);
    $validateData['foto'] = $imageName;

}

        testimoni::create($validateData);

        
        return redirect('/tampilan/testimoni')->with('success', 'New Menu Has Been Add');


    }

     public function testimoniedit(Request $request){
        
         $validateData = $request->validate([
            'name' => ['required'],
          
            'body' => ['required'],
            'foto' => 'image',
        ]);
        if ($request->file('foto')) {
    $imageName = time() . '.' . $request->foto->extension();
    $path = '/home/u290583795/domains/pateenxfatboyfactory.com/public_html/post-image/';
    $validateData['foto'] = $request->file('foto')->move($path, $imageName);
    $validateData['foto'] = $imageName;

}


        testimoni::where('id', $request->id)->update($validateData);

        return redirect('/tampilan/testimoni')->with('success', 'Menu Has Been Change');

    }
    
         public function testimonidelete(ourblog $ourblogdelete, $alt){

          
         testimoni::destroy($alt);
       return redirect('/tampilan/testimoni')->with('success', 'Menu Has Been Delete');

        }


         // Bestfood

          public function bestfoodsave(Request $request){
         $validateData = $request->validate([
            'name' => ['required'],
         
            'body' => ['required'],
            'foto' => 'image|required',
        ]);

        $imageName = time() . '.' . $request->foto->extension();
if ($request->file('foto')) {
    $path = '/home/u290583795/domains/pateenxfatboyfactory.com/public_html/post-image/';
    $validateData['foto'] = $request->file('foto')->move($path, $imageName);
    $validateData['foto'] = $imageName;

}

        Bestfood::create($validateData);


        
        return redirect('/tampilan/bestfood')->with('success', 'New Menu Has Been Add');


    }

     public function bestfoodedit(Request $request){
        
         $validateData = $request->validate([
            'name' => ['required'],
          
            'body' => ['required'],
            'foto' => 'image',
        ]);
        if ($request->file('foto')) {
    $imageName = time() . '.' . $request->foto->extension();
    $path = '/home/u290583795/domains/pateenxfatboyfactory.com/public_html/post-image/';
    $validateData['foto'] = $request->file('foto')->move($path, $imageName);
    $validateData['foto'] = $imageName;

}


        Bestfood::where('id', $request->id)->update($validateData);

        return redirect('/tampilan/bestfood')->with('success', 'Menu Has Been Change');

    }
    
         public function bestfooddelete(ourblog $ourblogdelete, $alt){

          
         Bestfood::destroy($alt);
       return redirect('/tampilan/bestfood')->with('success', 'Menu Has Been Delete');

        }

         public function dashboardedit(Request $request){
        
         $validateData = $request->validate([
            'judul' => ['required'],
          
            'body' => ['required'],
           
        ]);


        dashboard::where('id', 1)->update($validateData);

        return redirect('/tampilan/dashboard')->with('success', 'Menu Has Been Change');

        
    }

    
    public function biodataedit(Request $request)
    {
       $validateData = $request->validate([
    'contact' => ['required'],
    'email' => ['required'],
    'alamat' => ['required'],
    'aboutourfood' => ['required'],
    'aof_body' => ['required'],
    'ourblog' => ['required'],
    'ourblog_body' => ['required'],

    ]);

    Biodata::where('id', 1)->update($validateData);

    return redirect('/tampilan/biodata')->with('success', 'Menu Has Been Change');


    }

}
