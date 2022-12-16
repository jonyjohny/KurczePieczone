<?php

namespace App\Http\Controllers;

use App\Models\Reproduction;
use App\Models\Reproductionrow;
use App\Models\ReproductionReport;

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

    public function report(Reproduction $reproduction)
    {
        $this->authorize('viewAny', ReproductionReport::class);
        return view(
            'reproductionreport.report'
        , [
            'reproduction' => $reproduction
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
