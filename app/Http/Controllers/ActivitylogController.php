<?php

namespace App\Http\Controllers;

use App\Models\activitylog;
use Illuminate\Http\Request;

class ActivitylogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.log.activityLog');
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
    public function show(activitylog $activitylog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(activitylog $activitylog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, activitylog $activitylog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(activitylog $activitylog)
    {
        //
    }
}
