<?php

namespace App\Http\Controllers;

use App\Models\DetallePerdidas;
use App\Http\Requests\StoreDetallePerdidasRequest;
use App\Http\Requests\UpdateDetallePerdidasRequest;

class DetallePerdidasController extends Controller
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
     * @param  \App\Http\Requests\StoreDetallePerdidasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetallePerdidasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetallePerdidas  $detallePerdidas
     * @return \Illuminate\Http\Response
     */
    public function show(DetallePerdidas $detallePerdidas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetallePerdidas  $detallePerdidas
     * @return \Illuminate\Http\Response
     */
    public function edit(DetallePerdidas $detallePerdidas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetallePerdidasRequest  $request
     * @param  \App\Models\DetallePerdidas  $detallePerdidas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetallePerdidasRequest $request, DetallePerdidas $detallePerdidas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetallePerdidas  $detallePerdidas
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetallePerdidas $detallePerdidas)
    {
        //
    }
}
