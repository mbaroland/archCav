<?php

namespace App\Http\Controllers;

use App\Models\realisateur;
use Illuminate\Http\Request;


class RealisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        $archive = Realisateur::create($request ->all());
        return redirect()->route('partenaire.index')->with('success', 'partenaires supprimé avec succès.');

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
        //
    }
























}
