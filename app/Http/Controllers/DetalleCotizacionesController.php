<?php

namespace App\Http\Controllers;

use App\Models\DetalleCotizaciones;
use App\Http\Requests\StoreDetalleCotizacionesRequest;
use App\Http\Requests\UpdateDetalleCotizacionesRequest;

class DetalleCotizacionesController extends Controller
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
     * @param  \App\Http\Requests\StoreDetalleCotizacionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetalleCotizacionesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleCotizaciones  $detalleCotizaciones
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleCotizaciones $detalleCotizaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleCotizaciones  $detalleCotizaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleCotizaciones $detalleCotizaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetalleCotizacionesRequest  $request
     * @param  \App\Models\DetalleCotizaciones  $detalleCotizaciones
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetalleCotizacionesRequest $request, DetalleCotizaciones $detalleCotizaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleCotizaciones  $detalleCotizaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleCotizaciones $detalleCotizaciones)
    {
        //
    }
}
