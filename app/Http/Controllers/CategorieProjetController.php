<?php

namespace App\Http\Controllers;

use App\Models\Categorie_projet;
use App\Models\CategorieProjet;
use App\Models\Projet;
use Illuminate\Http\Request;

class CategorieProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $projets = Projet::latest()->get();

        $projet_categories = CategorieProjet::latest()->get();
        return view('categorie_projet.index', compact('projet_categories','projets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return  view('categorie_projet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorie_projet = CategorieProjet::create($request->all());
        return redirect()->route('categorie_projet.index')->with('success', 'Consultant supprimé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategorieProjet $categorie_projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(CategorieProjet $categorie_projet)
    {   
        $projets = Projet::latest()->get();
        return view('categorie_projet.index', compact('categorie_projet',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategorieProjet $categorie_projet)
    {
        $categorie_projet->update($request->all());
        
        return redirect()->route('categorie_projet.index')->with('success', 'categorie_projet mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(CategorieProjet $categorie_projet)
    {
        //dd($categorie_projet);
        $categorie_projet->delete();
        return redirect()->route('categorie_projet.index')->with('success', 'Consultant supprimé avec succès.');
    }
}
