<?php

namespace App\Http\Controllers;

use App\Models\Tank;
use Illuminate\Http\Request;

class TankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tank::latest()->get();
        return view('admin.tanks', ["data" => $data]);
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
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $manager = new Tank();
        $manager->name = $request->name;
        $manager->address = $request->address;
        $manager->save();
        return redirect('/admin/tanks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tank $tank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tank $tank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tank $tank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tank $tank)
    {
        //
    }
}
