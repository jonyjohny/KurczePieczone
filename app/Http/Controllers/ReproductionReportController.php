<?php

namespace App\Http\Controllers;

use App\Models\Reproduction;
use App\Models\Reproductionrow;
use App\Models\ReproductionReport;
use App\Models\Reproductionrowcages;

class ReproductionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Reproductionrowcages $reproductionrowcage)
    {
        $this->authorize('viewAny', ReproductionReport::class);
        return view(
            'reproductionreport.index'
        , [
            'reproductionrowcage' => $reproductionrowcage
        ]);
    }

    public function report(Reproduction $reproduction)
    {
        $this->authorize('viewAny', ReproductionReport::class);
        return view(
            'reproductionreport.report'
        , [
            'reproduction' => $reproduction
        ]);
    }

    public function reportrow(Reproductionrow $reproductionrow)
    {
        $this->authorize('viewAny', ReproductionReport::class);
        return view(
            'reproductionreport.reportrow'
        , [
            'reproductionrow' => $reproductionrow
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Reproductionrowcages $reproductionrowcage)
    {
        $this->authorize('create', ReproductionReport::class);
        return view(
            'reproductionreport.form'
            , [
                'reproductionrowcage' => $reproductionrowcage
            ]);
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
