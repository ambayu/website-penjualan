<?php

namespace App\Http\Controllers;

use App\Models\ourblog;
use App\Http\Requests\StoreourblogRequest;
use App\Http\Requests\UpdateourblogRequest;

class OurblogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreourblogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreourblogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ourblog  $ourblog
     * @return \Illuminate\Http\Response
     */
    public function show(ourblog $ourblog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ourblog  $ourblog
     * @return \Illuminate\Http\Response
     */
    public function edit(ourblog $ourblog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateourblogRequest  $request
     * @param  \App\Models\ourblog  $ourblog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateourblogRequest $request, ourblog $ourblog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ourblog  $ourblog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ourblog $ourblog)
    {
        //
    }
}
