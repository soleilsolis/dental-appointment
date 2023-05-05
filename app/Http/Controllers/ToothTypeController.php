<?php

namespace App\Http\Controllers;

use App\Models\ToothType;
use App\Http\Requests\StoreToothTypeRequest;
use App\Http\Requests\UpdateToothTypeRequest;

class ToothTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreToothTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreToothTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToothType  $toothType
     * @return \Illuminate\Http\Response
     */
    public function show(ToothType $toothType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToothType  $toothType
     * @return \Illuminate\Http\Response
     */
    public function edit(ToothType $toothType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateToothTypeRequest  $request
     * @param  \App\Models\ToothType  $toothType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateToothTypeRequest $request, ToothType $toothType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToothType  $toothType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToothType $toothType)
    {
        //
    }
}
