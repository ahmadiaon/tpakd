<?php

namespace App\Http\Controllers;

use App\Models\BankOwner;
use App\Http\Requests\StoreBankOwnerRequest;
use App\Http\Requests\UpdateBankOwnerRequest;

class BankOwnerController extends Controller
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
     * @param  \App\Http\Requests\StoreBankOwnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankOwnerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankOwner  $bankOwner
     * @return \Illuminate\Http\Response
     */
    public function show(BankOwner $bankOwner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankOwner  $bankOwner
     * @return \Illuminate\Http\Response
     */
    public function edit(BankOwner $bankOwner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBankOwnerRequest  $request
     * @param  \App\Models\BankOwner  $bankOwner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankOwnerRequest $request, BankOwner $bankOwner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankOwner  $bankOwner
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankOwner $bankOwner)
    {
        //
    }
}
