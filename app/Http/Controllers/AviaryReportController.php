<?php

namespace App\Http\Controllers;

use App\Models\Aviaryplace;
use App\Models\AviaryReport;
use App\Http\Requests\StoreAviaryReportRequest;
use App\Http\Requests\UpdateAviaryReportRequest;

class AviaryReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Aviaryplace $aviaryplace)
    {
        $this->authorize('viewAny', AviaryReport::class);
        return view(
            'aviaryreport.index'
        , [
            'aviaryplace' => $aviaryplace
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Aviaryplace $aviaryplace)
    {
        $this->authorize('create', AviaryReport::class);
        return view(
            'aviaryreport.form'
            , [
                'aviaryplace' => $aviaryplace
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAviaryReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAviaryReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AviaryReport  $aviaryReport
     * @return \Illuminate\Http\Response
     */
    public function show(AviaryReport $aviaryReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AviaryReport  $aviaryReport
     * @return \Illuminate\Http\Response
     */
    public function edit(AviaryReport $aviaryreport)
    {
        $this->authorize('update', $aviaryreport);
        return view(
            'aviaryreport.form',
            [
                'aviaryreport' => $aviaryreport
            ],
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAviaryReportRequest  $request
     * @param  \App\Models\AviaryReport  $aviaryReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAviaryReportRequest $request, AviaryReport $aviaryReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AviaryReport  $aviaryReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(AviaryReport $aviaryReport)
    {
        //
    }
}
