<?php

namespace App\Http\Controllers;

use App\Models\CategorieProjet;
use App\Models\Fichier;
use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projets = Projet::latest()->get();
        $categorie_projets=CategorieProjet::latest()->get();
        //dd($categorie_projets[0]->nom_categorie);
      //  dd($projets[3]->fichiers);//
        $fichier=Fichier::all();
       // dd($fichier[0]->id_projet);
        return view('projet.index', compact('projets', 'categorie_projets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projets = Projet::latest()->get();
        $categorie_projets=CategorieProjet::latest()->get();
        //dd($categorie_projets[0]->nom_categorie);
        return view('projet.create', compact('projets', 'categorie_projets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request['id_user']=1;

         $projets = Projet::create($request->all());
        //$projets="";
        //dd($request->file('fichier_projet'));
     
        $projets->add_pojet($request);


        return redirect()->route('projet.index')->with('success', 'Consultant supprimé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Projet $projet)
    {
        //
        return view('projet.edit',compact('projets','categorie_projets','projet','cat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projet $projet)
    {
        //

        $projets = Projet::latest()->get();
        $categorie_projets=CategorieProjet::latest()->get();

        $cat = CategorieProjet::all()-> pluck('nom_categorie','id');

        return view('projet.edit',compact('projet','cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projet $projet)
    {
        //
        $projet->update($request->all());


        return redirect()->route('projet.index')->with('success', 'Consultant supprimé avec succès.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {
       //dd($categorie_projet);
       $projet->delete();
       return redirect()->route('projet.index')->with('success', 'Consultant supprimé avec succès.');
    }
}
