<?php

namespace App\Http\Controllers;

use App\Models\accessModel;
use Illuminate\Http\Request;

class AccessModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $access_model = acesssModel::all();
        // return view('layouts.auth.accessmodel')->with('model_list', $access_model);
        return view('layouts.auth.accessmodel');
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
    public function show(accessModel $accessModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(accessModel $accessModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, accessModel $accessModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(accessModel $accessModel)
    {
        //
    }
}
