<?php

namespace App\Http\Controllers;

use App\Models\Pelugem;
use Illuminate\Http\Request;

class PelugensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin-create-pelugem');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin-create-pelugem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin-create-pelugem');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelugem  $pelugem
     * @return \Illuminate\Http\Response
     */
    public function show(Pelugem $pelugem)
    {
        $this->authorize('admin-view-pelugem');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelugem  $pelugem
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelugem $pelugem)
    {
        $this->authorize('admin-edit-pelugem');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelugem  $pelugem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelugem $pelugem)
    {
        $this->authorize('admin-edit-pelugem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelugem  $pelugem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelugem $pelugem)
    {
        $this->authorize('admin-delete-pelugem');
    }
}
