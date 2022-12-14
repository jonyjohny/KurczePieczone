<?php

namespace App\Http\Controllers;

use App\Models\IncubationReport;
use App\Http\Requests\StoreIncubationReportRequest;
use App\Http\Requests\UpdateIncubationReportRequest;
use App\Models\Incubationincubator;

class IncubationReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Incubationincubator $incubationincubator)
    {
        $this->authorize('viewAny', IncubationReport::class);
        return view(
            'incubationreport.index'
        , [
            'incubationincubator' => $incubationincubator
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Incubationincubator $incubationincubator)
    {
        $this->authorize('create', IncubationReport::class);
        return view(
            'incubationreport.form'
            , [
                'incubationincubator' => $incubationincubator
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIncubationReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncubationReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncubationReport  $incubationReport
     * @return \Illuminate\Http\Response
     */
    public function show(IncubationReport $incubationReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncubationReport  $incubationReport
     * @return \Illuminate\Http\Response
     */
    public function edit(IncubationReport $incubationreport)
    {
        $this->authorize('update', $incubationreport);
        return view(
            'incubationreport.form',
            [
                'incubationreport' => $incubationreport
            ],
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIncubationReportRequest  $request
     * @param  \App\Models\IncubationReport  $incubationReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncubationReportRequest $request, IncubationReport $incubationReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncubationReport  $incubationReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncubationReport $incubationReport)
    {
        //
    }
}
