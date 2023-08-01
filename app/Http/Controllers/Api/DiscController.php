<?php

namespace App\Http\Controllers\Api;

use App\Models\Disc;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiscRequest;
use App\Http\Requests\UpdateDiscRequest;

class DiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discs = Disc::get();

        return response()->json([
            'success' => true,
            'data' => $discs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiscRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscRequest $request)
    {
        $data = $request->validated();

        Disc::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Disc created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function show(Disc $disc)
    {
        return response()->json([
            'success' => true,
            'data' => $disc
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscRequest  $request
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscRequest $request, Disc $disc)
    {
        $data = $request->validated();

        $disc->update($data);

        return response()->json([
            'data' => $disc,
            'success' => true,
            'message' => 'Disc updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disc $disc)
    {
        $disc->delete();

        return response()->json([
            'success' => true,
            'message' => 'Disc deleted successfully'
        ]);
    }
}
