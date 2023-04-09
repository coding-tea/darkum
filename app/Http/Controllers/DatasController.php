<?php

namespace App\Http\Controllers;

use App\Models\Datas;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDatasRequest;
use App\Http\Requests\UpdateDatasRequest;

class DatasController extends Controller
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
     * @param  \App\Http\Requests\StoreDatasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDatasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datas  $datas
     * @return \Illuminate\Http\Response
     */
    public function show(Datas $datas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datas  $datas
     * @return \Illuminate\Http\Response
     */
    public function edit(Datas $datas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDatasRequest  $request
     * @param  \App\Models\Datas  $datas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDatasRequest $request, Datas $datas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datas  $datas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datas $datas)
    {
        //
    }
}
