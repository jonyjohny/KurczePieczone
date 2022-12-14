<?php

namespace App\Http\Controllers;

use App\Models\Reproduction;
use App\Models\Reproductionrow;
use App\Models\Reproductionrowcages;
use Illuminate\Http\Request;

class ReproductionrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Reproduction $reproduction)
    {
        $this->authorize('viewAny', Reproductionrow::class);

        return view(
            'reproductionrows.index',
            [
                'reproduction' => $reproduction,
            ]
        );
    }

    public function chart(Reproduction $reproduction)
    {
        $this->authorize('viewAny', Reproductionrow::class);
        $reproductionrows = Reproductionrow::where('id_reproduction', $reproduction->id)->with('reproductionrowcage.reproductionreport')->get();
        $cages = 0;

        foreach ($reproductionrows as $reproductionrow) {
            $cagestmp = $reproductionrow->reproductionrowcage()->count();
            if ($cages < $cagestmp) {
                $cages = $cagestmp;
            }
        }

        return view(
            'reproductionrows.chart',
            [
                'reproduction' => $reproduction,
                'reproductionrows' => $reproductionrows,
                'cages' => $cages,
            ]
        );
    }

    public static function hens(Reproductionrowcages $reproductionrowcages)
    {
        $deadhens = 33;
        echo $deadhens;
    }

    public function roosters(Reproductionrowcages $reproductionrowcages)
    {
        $deadroosters = 44;

        return $deadroosters;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Reproduction $reproduction)
    {
        $this->authorize('create', Reproductionrow::class);

        return view(
            'reproductionrows.form',
            [
                'reproduction' => $reproduction,
            ]
        );
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reproductionrow $reproductionrow)
    {
        $this->authorize('update', $reproductionrow);

        return view(
            'reproductionrows.form',
            [
                'reproductionrow' => $reproductionrow,
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
