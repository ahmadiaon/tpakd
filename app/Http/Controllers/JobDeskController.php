<?php

namespace App\Http\Controllers;

use App\Models\JobDesk;
use App\Http\Requests\StoreJobDeskRequest;
use App\Http\Requests\UpdateJobDeskRequest;

class JobDeskController extends Controller
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
     * @param  \App\Http\Requests\StoreJobDeskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobDeskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobDesk  $jobDesk
     * @return \Illuminate\Http\Response
     */
    public function show(JobDesk $jobDesk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobDesk  $jobDesk
     * @return \Illuminate\Http\Response
     */
    public function edit(JobDesk $jobDesk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobDeskRequest  $request
     * @param  \App\Models\JobDesk  $jobDesk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobDeskRequest $request, JobDesk $jobDesk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobDesk  $jobDesk
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobDesk $jobDesk)
    {
        //
    }
}
