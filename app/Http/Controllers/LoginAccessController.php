<?php

namespace App\Http\Controllers;

use App\Models\LoginAccess;
use Illuminate\Http\Request;

class LoginAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.auth.login');
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
    public function show(LoginAccess $loginAccess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoginAccess $loginAccess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoginAccess $loginAccess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoginAccess $loginAccess)
    {
        //
    }
}
