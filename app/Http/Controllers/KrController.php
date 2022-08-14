<?php

namespace App\Http\Controllers;

use App\Models\kr;
use App\Http\Requests\StorekrRequest;
use App\Http\Requests\UpdatekrRequest;

class KrController extends Controller
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
     * @param  \App\Http\Requests\StorekrRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekrRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kr  $kr
     * @return \Illuminate\Http\Response
     */
    public function show(kr $kr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kr  $kr
     * @return \Illuminate\Http\Response
     */
    public function edit(kr $kr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekrRequest  $request
     * @param  \App\Models\kr  $kr
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekrRequest $request, kr $kr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kr  $kr
     * @return \Illuminate\Http\Response
     */
    public function destroy(kr $kr)
    {
        //
    }
}
