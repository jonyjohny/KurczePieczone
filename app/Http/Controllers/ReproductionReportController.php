<?php

namespace App\Http\Controllers;

use App\Models\ReproductionReport;
use App\Http\Requests\StoreReproductionReportRequest;
use App\Http\Requests\UpdateReproductionReportRequest;
use App\Models\Reproductionrow;

class ReproductionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Reproductionrow $reproductionrow)
    {
        $this->authorize('viewAny', ReproductionReport::class);
        return view(
            'reproductionreport.index'
        , [
            'reproductionrow' => $reproductionrow
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Reproductionrow $reproductionrow)
    {
        $this->authorize('create', ReproductionReport::class);
        return view(
            'reproductionreport.form'
            , [
                'reproductionrow' => $reproductionrow
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReproductionReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReproductionReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReproductionReport  $reproductionReport
     * @return \Illuminate\Http\Response
     */
    public function show(ReproductionReport $reproductionReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReproductionReport  $reproductionReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ReproductionReport $reproductionreport)
    {
        $this->authorize('update', $reproductionreport);
        return view(
            'reproductionreport.form',
            [
                'reproductionreport' => $reproductionreport
            ],
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReproductionReportRequest  $request
     * @param  \App\Models\ReproductionReport  $reproductionReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReproductionReportRequest $request, ReproductionReport $reproductionReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReproductionReport  $reproductionReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReproductionReport $reproductionReport)
    {
        //
    }
}
