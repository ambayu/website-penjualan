<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\transaksi;
use App\Models\ppn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = invoice::first(['invoice']);

        $purchases = transaksi::join('menus as a', 'menu_id', '=', 'a.id')
        ->join('invoices', 'transaksis.invoice', '=', 'invoices.invoice')
    ->selectRaw('a.harga ,transaksis.*, sum(a.harga * transaksis.jumlah) as tb');

    
     
        return view('/admin/kasir', [
            "title" => "Kasir",
            'menu' => menu::all(),

            'transaksi' => transaksi::where('invoice', $invoice->invoice)->get(),
            'ppn' => ppn::where('invoice','=', $invoice->invoice)->first(),
            'total' => $purchases->get(),
            'inv' => $invoice,

        ]);
   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/kasir', [
            "title" => "Kasir",
            'menu' => menu::all(),
            'transaksi' => transaksi::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $register = $request->validate([
            'menu_id' => ['required'],
            'jumlah' => ['required'],

        ]);

        $register['status'] = 1;
        $register['invoice'] = invoice::first()['invoice'];
     
        transaksi::create($register);

        return redirect('/kasir');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    public function ppn(Request $request)
    {
         $invoice = invoice::first()['invoice'];
        $ppn= ppn::where('invoice','=', $invoice)->get();
       

         if(isset($ppn[0]->invoice)){
             ppn::where('invoice', $invoice)->update(['ppn'=>$request->ppn]);
         }
         else{

             ppn::create(['invoice' => $invoice,'ppn' => $request->ppn]);
         }
        return redirect('/kasir');

    }

    public function delAll(Request $request)
    {
        $inv = "inv" . time();

        $invoice = invoice::first()['invoice'];
        transaksi::where('invoice', $invoice)->update(['status' => '4']);

        meja::create(['invoice' => $invoice,'no_meja' => 0]);

        


        invoice::where('id', 1)->update(['invoice' => $inv]);

        return redirect('/kasir');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $kasir)
    {
        transaksi::destroy($kasir->id);
        return redirect('/kasir')->with('success', 'Menu Has Been Delete');

    }
}
