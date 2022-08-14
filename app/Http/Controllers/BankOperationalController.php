<?php

namespace App\Http\Controllers;

use App\Models\BankOperational;
use App\Http\Requests\StoreBankOperationalRequest;
use App\Http\Requests\UpdateBankOperationalRequest;

class BankOperationalController extends Controller
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
     * @param  \App\Http\Requests\StoreBankOperationalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankOperationalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankOperational  $bankOperational
     * @return \Illuminate\Http\Response
     */
    public function show(BankOperational $bankOperational)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankOperational  $bankOperational
     * @return \Illuminate\Http\Response
     */
    public function edit(BankOperational $bankOperational)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBankOperationalRequest  $request
     * @param  \App\Models\BankOperational  $bankOperational
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankOperationalRequest $request, BankOperational $bankOperational)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankOperational  $bankOperational
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankOperational $bankOperational)
    {
        //
    }
}
