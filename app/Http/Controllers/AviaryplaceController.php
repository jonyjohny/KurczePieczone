<?php

namespace App\Http\Controllers;

use App\Models\AviaryPlace;
use App\Http\Requests\StoreAviaryPlaceRequest;
use App\Http\Requests\UpdateAviaryPlaceRequest;

class AviaryplaceController extends Controller
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
     * @param  \App\Http\Requests\StoreAviaryPlaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAviaryPlaceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AviaryPlace  $aviaryPlace
     * @return \Illuminate\Http\Response
     */
    public function show(AviaryPlace $aviaryPlace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AviaryPlace  $aviaryPlace
     * @return \Illuminate\Http\Response
     */
    public function edit(AviaryPlace $aviaryPlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAviaryPlaceRequest  $request
     * @param  \App\Models\AviaryPlace  $aviaryPlace
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAviaryPlaceRequest $request, AviaryPlace $aviaryPlace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AviaryPlace  $aviaryPlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(AviaryPlace $aviaryPlace)
    {
        //
    }
}
