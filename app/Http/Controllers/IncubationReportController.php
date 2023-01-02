<?php

namespace App\Http\Controllers;

use App\Models\Incubation;
use App\Models\Incubationincubator;
use App\Models\IncubationReport;

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
            'incubationreport.index', [
                'incubationincubator' => $incubationincubator,
            ]);
    }

    public function report(Incubation $incubation)
    {
        $this->authorize('viewAny', IncubationReport::class);

        return view(
            'incubationreport.report', [
                'incubation' => $incubation,
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
            'incubationreport.form', [
                'incubationincubator' => $incubationincubator,
            ]);
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
                'incubationreport' => $incubationreport,
            ],
        );
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
