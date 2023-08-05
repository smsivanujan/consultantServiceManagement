<?php

namespace App\Http\Controllers;

use App\Models\jobseeker;
use Illuminate\Http\Request;

class JobseekerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.jobseeker.jobseeker');
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
    public function show(jobseeker $jobseeker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jobseeker $jobseeker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jobseeker $jobseeker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jobseeker $jobseeker)
    {
        //
    }
}
