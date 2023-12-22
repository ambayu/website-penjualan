<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\Menu;
use App\Models\meja;
use App\Models\ppn;
class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    dd(request('menu'));

        return view('/admin/laporan', [
             "title" => "Laporan",
             'menu' => Menu::all(),
             'transaksi' => transaksi::latest()->filter(request(['date1','date2','meja','menu_id']))->paginate(30)->withQueryString(), 
             'jum' => transaksi::filter(request(['date1','date2','meja','menu_id']))->get(), 
             
             // 'total' =>transaksi::filter(request(['date1','date2','meja','menu_id']))->sum('(jumlah * harga)'),
    ]);

    }
     public function laporanrekap()
    {
        return view('/admin/laporanrekap', [
            "title" => "Laporan",
            'menu' => Menu::all(),
            'transaksi' => transaksi::latest()->filter(request(['date1', 'date2', 'meja', 'menu_id']))->selectRaw("*,DATE_FORMAT(created_at, '%Y-%m-%d') AS new_date,SUM(jumlah) as jums")->groupBy('new_date', 'menu_id')->paginate(30)->withQueryString(),
            'jum' => transaksi::filter(request(['date1', 'date2', 'meja', 'menu_id']))->get(),

            // 'total' =>transaksi::filter(request(['date1','date2','meja','menu_id']))->sum('(jumlah * harga)'),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    

    public function store(Request $request)
    {
        // $startDate = Carbon::createFromFormat('d/m/Y', $request['date1']);

        // $endDate = Carbon::createFromFormat('d/m/Y', $request['date2']);

    //     $dateS = new Carbon( $request['date1']);
    //     $dateE = new Carbon($request['date2']);
        
       

    //     $post=transaksi::with(['meja'])->orWhereBetween('created_at', [$dateS, $dateE])
    //     ->orWhere('menu_id','=',$request['menu_id']);


         
    //      return view('/admin/laporan', [
    //         "title" => "Laporan",
    //         "transaksi" => $post->get(),
    //         'menu' => menu::all(),
    // ]);

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
        //
    }
}
