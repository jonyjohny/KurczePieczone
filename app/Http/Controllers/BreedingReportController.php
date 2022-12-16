<?php

namespace App\Http\Controllers;

use App\Models\Breeding;
use App\Models\Breedingplace;
use App\Models\BreedingReport;

class BreedingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Breedingplace $breedingplace)
    {
        $this->authorize('viewAny', BreedingReport::class);
        return view(
            'breedingreport.index'
        , [
            'breedingplace' => $breedingplace
        ]);
    }

    public function report(Breeding $breeding)
    {
        $this->authorize('viewAny', BreedingReport::class);
        return view(
            'breedingreport.report'
        , [
            'breeding' => $breeding
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Breedingplace $breedingplace)
    {
        $this->authorize('create', BreedingReport::class);
        return view(
            'breedingreport.form'
            , [
                'breedingplace' => $breedingplace
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BreedingReport  $breedingReport
     * @return \Illuminate\Http\Response
     */
    public function show(BreedingReport $breedingReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BreedingReport  $breedingReport
     * @return \Illuminate\Http\Response
     */
    public function edit(BreedingReport $breedingreport)
    {
        $this->authorize('update', $breedingreport);
        return view(
            'breedingreport.form',
            [
                'breedingreport' => $breedingreport
            ],
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BreedingReport  $breedingReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(BreedingReport $breedingReport)
    {
        //
    }
}
