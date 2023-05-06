<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Status;
use App\Models\Tank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manager = Manager::where('id', Auth::guard('manager')->id())->first();
        $tankId = $manager['tank_id'];
        $tankStatus = Status::latest()->where('tank_id', $tankId)->first();
        return view('manager.dashboard', ["data" => $tankStatus]);
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
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        //
    }
}
