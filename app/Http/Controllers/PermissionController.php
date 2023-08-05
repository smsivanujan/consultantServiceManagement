<?php

namespace App\Http\Controllers;

use App\Models\permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //get user role permission array
        // $permission = permission::where('user_id', $id)->first();
        // // get user role by id
        // $user = User::find($id);
        // //get Access models
        // $access_model = acesssModel::all();
        // //get all access point
        // $access_point = acesssPoint::all();
        // return view('layouts.auth.permission')
        //     ->with('access_model', $access_model)
        //     ->with('user', $user)
        //     ->with('permission', $permission)
        //     ->with('access_point', $access_point);
        return view('layouts.auth.permission');
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
    public function show(permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(permission $permission)
    {
        //
    }
}
