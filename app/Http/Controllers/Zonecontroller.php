<?php

namespace App\Http\Controllers;
use App\Models\Zone;
use Illuminate\Http\Request;

class Zonecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {dd('help');
       $zone= Zone::all();
        
       return redirect()->route('zones.index')->with('success', '');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("zones.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $zone = Zone::create($request->all());
        return redirect()->route('zones.index')->with('success', '');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $zone = Zone::latest()->get();
        return view('categorie_projet.edit', compact('categorie_projet','projets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zone $zone)
    {
        //

        $zone->update($request->all());
        
        return redirect()->route('zones.index')->with('success', 'Axe stratégique mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zone $zone)
    {
        $zone->delete();
         
        return redirect()->route('zones.index')->with('success', 'Axe stratégique mis à jour avec succès.');
    }
}
