<?php

namespace App\Http\Controllers;

use App\Models\Incubation;
use Illuminate\Http\Request;
use App\Models\Incubationincubator;

class IncubationincubatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Incubation $incubation)
    {
        $this->authorize('viewAny', Incubationincubator::class);
        return view(
            'incubationincubators.index'
        , [
            'incubation' => $incubation
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Incubation $incubation)
    {
        $this->authorize('create', Incubationincubator::class);
        return view(
            'incubationincubators.form'
            , [
                'incubation' => $incubation
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incubationincubator  $incubationincubator
     * @return \Illuminate\Http\Response
     */
    public function show(Incubationincubator $incubationincubator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incubationincubator  $incubationincubator
     * @return \Illuminate\Http\Response
     */
    public function edit(Incubationincubator $incubationincubator)
    {
        $this->authorize('update', $incubationincubator);
        return view(
            'incubationincubators.form',
            [
                'incubationincubator' => $incubationincubator
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incubationincubator  $incubationincubator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incubationincubator $incubationincubator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incubationincubator  $incubationincubator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incubationincubator $incubationincubator)
    {
        //
    }
}
