<?php

namespace App\Http\Controllers;

use App\Models\CategorieProjet;
use App\Models\Fichier;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projets = Projet::latest()->get();
        $categorie_projets=CategorieProjet::latest()->get();

        $fichier=Fichier::all();

        return view('projet.index', compact('projets', 'categorie_projets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projets = Projet::latest()->get();
        $categorie_projets=CategorieProjet::latest()->get();

        return view('projet.create', compact('projets', 'categorie_projets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $request['id_user'] =Auth::user()->id;
    $request->validate(Projet::rules());
    $projets = Projet::create($request->all());
    $projets->add_pojet($request);

    return redirect()->route('projet.index')->with('success', 'Projet ajouté avec succès.');

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

        $categorie_old = CategorieProjet::find($projet->id_categorie);

        $fichier=Fichier::find($projet->id);
        dd($fichier);

        return view('projet.edit',compact('projets','categorie_projets','projet','categorie_old','fichier'));
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




    private function validateProjetData(Request $request)
    {
        return Validator::make($request->all(), [
            'titre_projet' => 'required|string|min:3',
            'objectif_global' => 'required|string|min:5',
            'financement' => 'required|string|min:3',
            'budjet' => 'required|numeric',
            'zone' => 'required|string|min:3',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ], [
            'titre_projet.min' => 'Le champ Nom du Projet doit comporter au moins 3 caractères.',
            'objectif_global.min' => 'Le champ Objectif Global doit comporter au moins 5 caractères.',
            'financement.min' => 'Le champ Financement doit comporter au moins 3 caractères.',
            'budjet.numeric' => 'Le champ Budget doit contenir uniquement des chiffres.',
            'zone.min' => 'Le champ Zone doit comporter au moins 3 caractères.',
            'date_debut.required' => 'Le champ Date de début du Projet est requis.',
            'date_fin.required' => 'Le champ Date de fin du Projet est requis.',
        ]);}





        public function search(Request $request)
        {
            $key = trim($request->get('q'));
    
            $posts = Projet::query()
                ->where('titre_projet', 'like', "%{$key}%")
                ->orWhere('objectif-global', 'like', "%{$key}%")
                ->orderBy('created_at', 'desc')
                ->get();
    
            $categories = Category::all();
    
            $tags = Tag::all();
    
            $recent_posts = Post::query()
                ->where('is_published', true)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
    
            return view('search', [
                'key' => $key,
                'posts' => $posts,
                'categories' => $categories,
                'tags' => $tags,
                'recent_posts' => $recent_posts
            ]);
        }

}
