<?php

namespace App\Http\Controllers;

use App\Models\Aviary;
use App\Models\Aviaryplace;

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
