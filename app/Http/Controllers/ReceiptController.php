<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\transaksi;
use App\Models\invoice;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin/receipt', [
            "title" => "Receipt Management",
            'transaksi' => transaksi::latest()->filter(request(['date1','date2','meja','menu_id']))
            ->join('menus as a','menu_id','=','a.id')
            ->selectRaw('a.harga ,transaksis.*, sum(a.harga * transaksis.jumlah) as tb')
          
            ->groupBy('invoice')

            ->paginate(10),
           
        ]);

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
       transaksi::where('invoice',$id)->delete();
       return redirect('/receipt')->with('success', 'Data Has Been Delete');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $sum= transaksi::where('invoice',$id)->join('menus as a','menu_id','=','a.id')

            ->selectRaw('a.harga ,transaksis.*, sum(a.harga * transaksis.jumlah) as tb');
       


         return view('/crud/edit_receipt', [
            "title" => "Receipt Management",
            'menu' => menu::all(),
            
            'transaksi' => transaksi::where('invoice', $id)->get(),
            'total' =>$sum->get(),
            'inv' => $id,
           
        ]);
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
        $register = $request->validate([
            'menu_id' => ['required'],
            'jumlah' => ['required'],

        ]);

        $register['status'] = 4;
        $register['invoice'] = $id;
        $register['user_id'] = auth()->user()->id;
        transaksi::create($register);

        return redirect('/receipt/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        transaksi::destroy($id);
        return redirect('/receipt/' . $request->inv . '/edit')->with('success', 'Data Has Been Delete');
    }
}
