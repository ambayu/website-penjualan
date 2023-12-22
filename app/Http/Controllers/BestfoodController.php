<?php

namespace App\Http\Controllers;

use App\Models\Bestfood;
use App\Http\Requests\StoreBestfoodRequest;
use App\Http\Requests\UpdateBestfoodRequest;

class BestfoodController extends Controller
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
     * @param  \App\Http\Requests\StoreBestfoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBestfoodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bestfood  $bestfood
     * @return \Illuminate\Http\Response
     */
    public function show(Bestfood $bestfood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bestfood  $bestfood
     * @return \Illuminate\Http\Response
     */
    public function edit(Bestfood $bestfood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBestfoodRequest  $request
     * @param  \App\Models\Bestfood  $bestfood
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBestfoodRequest $request, Bestfood $bestfood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bestfood  $bestfood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bestfood $bestfood)
    {
        //
    }
}
