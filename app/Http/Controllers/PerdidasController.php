<?php

namespace App\Http\Controllers;

use App\Models\Perdidas;
use App\Http\Requests\StorePerdidasRequest;
use App\Http\Requests\UpdatePerdidasRequest;

class PerdidasController extends Controller
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
     * @param  \App\Http\Requests\StorePerdidasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerdidasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perdidas  $perdidas
     * @return \Illuminate\Http\Response
     */
    public function show(Perdidas $perdidas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perdidas  $perdidas
     * @return \Illuminate\Http\Response
     */
    public function edit(Perdidas $perdidas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerdidasRequest  $request
     * @param  \App\Models\Perdidas  $perdidas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerdidasRequest $request, Perdidas $perdidas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perdidas  $perdidas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perdidas $perdidas)
    {
        //
    }
}
