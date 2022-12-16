<?php

namespace App\Http\Controllers;

use App\Models\Breeding;
use App\Models\Breedingplace;

class BreedingplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Breeding $breeding)
    {
        $this->authorize('viewAny', Breedingplace::class);
        return view(
            'breedingplaces.index'
        , [
            'breeding' => $breeding
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Breeding $breeding)
    {
        $this->authorize('create', Breedingplace::class);
        return view(
            'breedingplaces.form'
            , [
                'breeding' => $breeding
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Breedingplace  $breedingplace
     * @return \Illuminate\Http\Response
     */
    public function show(Breedingplace $breedingplace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Breedingplace  $breedingplace
     * @return \Illuminate\Http\Response
     */
    public function edit(Breedingplace $breedingplace)
    {
        $this->authorize('update', $breedingplace);
        return view(
            'breedingplaces.form',
            [
                'breedingplace' => $breedingplace
            ],
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Breedingplace  $breedingplace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breedingplace $breedingplace)
    {
        //
    }
}
