<?php

namespace App\Http\Controllers;

use App\Models\accessPoint;
use Illuminate\Http\Request;

class AccessPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $access_model = acesssModel::find($id);
        // $access_point = acesssPoint::where('access_model_id', $id)->get();

        // return view('layouts.auth.accesspoint')
        // ->with('access_model', $access_model)
        // ->with('access_point', $access_point);
        return view('layouts.auth.accesspoint');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(accessPoint $accessPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(accessPoint $accessPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, accessPoint $accessPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(accessPoint $accessPoint)
    {
        //
    }
}
