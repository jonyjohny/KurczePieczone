<?php

namespace App\Http\Controllers;

use App\Models\Reproductionrow;
use App\Models\Reproductionrowcages;
use App\Http\Requests\StoreReproductionrowcagesRequest;
use App\Http\Requests\UpdateReproductionrowcagesRequest;

class ReproductionrowcagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Reproductionrow $reproductionrow)
    {
        $this->authorize('viewAny', Reproductionrowcages::class);
        return view(
            'reproductionrowcages.index'
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
        $this->authorize('create', Reproductionrowcages::class);
        return view(
            'reproductionrowcages.form'
            , [
                'reproductionrow' => $reproductionrow
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reproductionrowcages  $reproductionrowcage
     * @return \Illuminate\Http\Response
     */
    public function show(Reproductionrowcages $reproductionrowcage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reproductionrowcages  $reproductionrowcage
     * @return \Illuminate\Http\Response
     */
    public function edit(Reproductionrowcages $reproductionrowcage)
    {
        $this->authorize('update', $reproductionrowcage);
        return view(
            'reproductionrowcages.form',
            [
                'reproductionrowcage' => $reproductionrowcage
            ],
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reproductionrowcages  $reproductionrowcage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reproductionrowcages $reproductionrowcage)
    {
        //
    }
}
