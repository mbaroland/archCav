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
        return redirect()->route('categorie_projet.index')->with('success', 'Axe stratégique ajouté avec succès.');
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
        return view('categorie_projet.edit', compact('categorie_projet','projets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategorieProjet $categorie_projet)
    {
        
        $categorie_projet->update($request->all());
        
        return redirect()->route('categorie_projet.index')->with('success', 'Axe stratégique mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(CategorieProjet $categorie_projet)
    {
        try {
            $categorie_projet->delete();
            return redirect()->route('categorie_projet.index')->with('success', 'Axe stratégique  supprimé avec succès.');
        } catch (\Throwable $th) {

            return redirect()->route('categorie_projet.index')->with('error', 'impossible de supprimer cet Axe stratégique, des projets lui sont rattachés');

        }
        
    }
}
