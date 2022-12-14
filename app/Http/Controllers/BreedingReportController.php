<?php

namespace App\Http\Controllers;

use App\Models\BreedingReport;
use App\Http\Requests\StoreBreedingReportRequest;
use App\Http\Requests\UpdateBreedingReportRequest;
use App\Models\Breedingplace;

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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBreedingReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBreedingReportRequest $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBreedingReportRequest  $request
     * @param  \App\Models\BreedingReport  $breedingReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBreedingReportRequest $request, BreedingReport $breedingReport)
    {
        //
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
