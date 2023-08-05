<?php

namespace App\Http\Controllers;

use App\Models\jobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.job.jobtype');
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
    public function show(jobType $jobType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jobType $jobType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jobType $jobType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jobType $jobType)
    {
        //
    }
}
