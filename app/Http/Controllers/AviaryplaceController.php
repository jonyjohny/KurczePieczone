<?php

namespace App\Http\Controllers;

use App\Models\Aviary;
use App\Models\Aviaryplace;
use App\Http\Requests\StoreAviaryPlaceRequest;
use App\Http\Requests\UpdateAviaryPlaceRequest;

class AviaryplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Aviary $aviary)
    {
        $this->authorize('viewAny', Aviaryplace::class);
        return view(
            'aviaryplaces.index'
        , [
            'aviary' => $aviary
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Aviary $aviary)
    {
        $this->authorize('create', Aviaryplace::class);
        return view(
            'aviaryplaces.form'
            , [
                'aviary' => $aviary
            ]);
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
    public function edit(Aviaryplace $aviaryplace)
    {
        $this->authorize('update', $aviaryplace);
        return view(
            'aviaryplaces.form',
            [
                'aviaryplace' => $aviaryplace
            ],
            );
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
