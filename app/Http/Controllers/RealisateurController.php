<?php

namespace App\Http\Controllers;

use App\Models\Realisateur;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class RealisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $realisateurs= Realisateur::all();
        return view("partenaires.index", compact("realisateurs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd("baki");
        // $realisateur= Realisateur::all();
        return view("partenaires.create");

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $partenaire = Realisateur::create($request->all());
        return redirect()->route('partenaires.index', compact('partenaire'));
    }

    /**
     * Display the specified resource.
     */
    public function show(realisateur $realisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(realisateur $realisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, realisateur $realisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(realisateur $realisateur)
    {
        $realisateur->delete();
        return redirect()->route('partenaires.index')->with('success', 'partenaires supprimé avec succès.');
    }
}
