<?php

namespace App\Http\Controllers;

use App\Models\Modification;
use App\Http\Requests\StoreModificationRequest;
use App\Http\Requests\UpdateModificationRequest;

class ModificationController extends Controller
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
     * @param  \App\Http\Requests\StoreModificationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modification  $modification
     * @return \Illuminate\Http\Response
     */
    public function show(Modification $modification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modification  $modification
     * @return \Illuminate\Http\Response
     */
    public function edit(Modification $modification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModificationRequest  $request
     * @param  \App\Models\Modification  $modification
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModificationRequest $request, Modification $modification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modification  $modification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modification $modification)
    {
        //
    }
}
