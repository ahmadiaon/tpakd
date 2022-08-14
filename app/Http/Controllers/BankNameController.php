<?php

namespace App\Http\Controllers;

use App\Models\BankName;
use App\Http\Requests\StoreBankNameRequest;
use App\Http\Requests\UpdateBankNameRequest;

class BankNameController extends Controller
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
     * @param  \App\Http\Requests\StoreBankNameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankNameRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankName  $bankName
     * @return \Illuminate\Http\Response
     */
    public function show(BankName $bankName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankName  $bankName
     * @return \Illuminate\Http\Response
     */
    public function edit(BankName $bankName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBankNameRequest  $request
     * @param  \App\Models\BankName  $bankName
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankNameRequest $request, BankName $bankName)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankName  $bankName
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankName $bankName)
    {
        //
    }
}
