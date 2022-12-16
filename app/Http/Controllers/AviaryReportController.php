<?php

namespace App\Http\Controllers;

use App\Models\Aviary;
use App\Models\Aviaryplace;
use App\Models\AviaryReport;

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

    public function report(Aviary $aviary)
    {
        $this->authorize('viewAny', AviaryReport::class);
        return view(
            'aviaryreport.report'
        , [
            'aviary' => $aviary
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
