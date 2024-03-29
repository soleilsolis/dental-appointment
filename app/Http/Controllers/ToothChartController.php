<?php

namespace App\Http\Controllers;

use App\Models\ToothChart;
use App\Models\Condition;
use App\Models\Modification;

use App\Http\Requests\StoreToothChartRequest;
use App\Http\Requests\UpdateToothChartRequest;
use Illuminate\Http\Request;

class ToothChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreToothChartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreToothChartRequest $request)
    {
        $data = ToothChart::create([
            'user_id' => $request->user_id,
            'tooth_type_id' => $request->tooth_type_id,
            'condition_id' => $request->condition_id,
        ]);

        return response()->json(compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToothChart  $toothChart
     * @return \Illuminate\Http\Response
     */
    public function show(ToothChart $toothChart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToothChart  $toothChart
     * @return \Illuminate\Http\Response
     */
    public function edit(ToothChart $toothChart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateToothChartRequest  $request
     * @param  \App\Models\ToothChart  $toothChart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToothChart $toothChart)
    {
        foreach ($request->all() as $key => $value) {
            $chartable = explode('_', $key);


            if ($chartable[0] === 'condition' && $value) {
                $toothChart = ToothChart::find($chartable[1]);

                $toothChart->condition_id = $value;
                $toothChart->save();

            }
            if ($chartable[0] === 'modification') {
                $toothChart = ToothChart::find($chartable[1]);
                $toothChart->modifications = json_encode($value);
                $toothChart->save();
                
            }

        }

        return response()->json([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToothChart  $toothChart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToothChart $toothChart)
    {
        //
    }
}
