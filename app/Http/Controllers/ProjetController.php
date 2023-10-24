<?php

namespace App\Http\Controllers;

use App\Models\CategorieProjet;
use App\Models\Fichier;
use App\Models\Projet;
use App\Models\Realisateur;
use App\Models\User;
use App\Models\Zone;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projets = Projet::latest()->get();
        $categorie_projets = CategorieProjet::latest()->get();
        $zones = Zone::latest()->get();

        $fichier = Fichier::all();
        $partenaire = Realisateur::all();
        $realisateurs = Realisateur::latest()->get();
        return view('projet.index', compact('partenaire', 'projets', 'categorie_projets', 'realisateurs','zones'));

        // if (count($projets) > 0) {

        //     foreach ($projets as $projet) {

        //         $utilisateur = User::find($projet->id_user);
        //     }



        //     return view('projet.index', compact('partenaire', 'projets', 'categorie_projets', 'realisateurs', 'utilisateur'));
        // } else {

        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projets = Projet::latest()->get();
        $categorie_projets = CategorieProjet::latest()->get();
        $realisateurs = Realisateur::latest()->get();
        $zones = Zone::latest()->get();
        

        return view('projet.create', compact('projets', 'categorie_projets', 'realisateurs','zones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request['id_user'] = Auth::user()->id;

        $request->validate(Projet::rules());

        
        //dd($request->all());

        $projets = Projet::create([
            'id_categorie' => $request->input('id_categorie'),
            'id_user' => $request->input('id_user'),
            'titre_projet' => $request->input('titre_projet'),
            'objectif_global' => $request->input('objectif_global'),
            'objectif_specifiques' => $request->input('objectif_specifiques'),
            'financement' => $request->input('financement'),
            'budjet' => $request->input('budjet'),
            'id_zone' => $request->input('zone'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
        ]);

        


        if ($request->file('fichier_projet') !== null) {
            $projets->add_pojet($request);
        }
        
        //$projets = Projet::create($request ->all());
        // dd($request->input('financement'));
        $projets->realisateurs()->attach($request->input('financement'));

       //$projets->zone()->attach($request->input('id_zone'));

        


        return redirect()->route('projet.index')->with('success', 'Projet ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Projet $projet)
    {
        //
        $zones = Zone::latest()->get();
        //ddd($projet);
        $partenaire = Realisateur::all();
        $projets = Projet::latest()->get();
        $categorie_projets = CategorieProjet::latest()->get();

        $utilisateur = User::find($projet->id_user);
                $zones = Zone::latest()->get();

                $zone = Zone::find($projet->id_zone);

        return view('projet.show', compact('categorie_projets', 'projet', 'projets', 'utilisateur', 'partenaire','zones','zone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projet $projet)
    {
        //

        $zones = Zone::latest()->get();

        $projets = Projet::latest()->get();
        $categorie_projets = CategorieProjet::latest()->get();
        



        $cat = CategorieProjet::all()->pluck('nom_categorie', 'id');

        $categorie_old = CategorieProjet::find($projet->id_categorie);

        $zon = Zone::all()->pluck('nom_projet', 'id');
        $zone_old = Zone::find($projet->id_zone);

        

        $fichier = Fichier::find($projet->id);

        $partenaires = Realisateur::all();
        $part = $projet->realisateurs;


        // dd($projet->realisateurs);
        $projet->realisateurs()->detach($part);

        return view('projet.edit', compact('partenaires', 'projets', 'categorie_projets', 'projet', 'categorie_old', 'fichier', 'part','zones','zone_old'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projet $projet)
    {
        //
        $request['id_user'] = Auth::user()->id;
        
        $projet->update([
            'id_categorie' => $request->input('id_categorie'),
            'id_user' => $request->input('id_user'),
            'titre_projet' => $request->input('titre_projet'),
            'objectif_global' => $request->input('objectif_global'),
            'objectif_specifiques' => $request->input('objectif_specifiques'),
            'financement' => $request->input('financement'),
            'budjet' => $request->input('budjet'),
            'id_zone' => $request->input('zone'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
        ]);

        if ($request->file('fichier_projet') !== null) {
            $projet->add_pojet($request);
        }
  

        

        $projet->realisateurs()->attach($request->input('financement'));

       // dd($request);
        return redirect()->route('projet.index')->with('success', 'projet mis à jour avec succès.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {
        //dd($categorie_projet);
        $fichiers = Fichier::where("id_projet", $projet->id)->get();
        foreach ($fichiers as $fichier) {
            if (Fichier::exists($fichier->nom_fichier)) {
                Storage::delete($fichier->nom_fichier);
            }
        }

        $projet->delete();
        return redirect()->route('projet.index')->with('success', 'projet supprimé avec succès.');
    }




    private function validateProjetData(Request $request)
    {
        return Validator::make(
            $request->all(),
            [
                'titre_projet' => 'required|string|min:3',
                'objectif_global' => 'required|string|min:5',
                'objectif_specifiques' => 'required|string|min:5',
                'financement' => 'required|string|min:3',
                'budjet' => 'required|numeric',
                'zone' => 'required|string|min:3',
                'date_debut' => 'required|date',
                'date_fin' => 'required|date',
            ],
            [
                'titre_projet.min' => 'Le champ Nom du Projet doit comporter au moins 3 caractères.',
                'objectif_global.min' => 'Le champ Objectif Global doit comporter au moins 5 caractères.',
                'financement.min' => 'Le champ Financement doit comporter au moins 3 caractères.',
                'budjet.numeric' => 'Le champ Budget doit contenir uniquement des chiffres.',
                'zone.min' => 'Le champ Zone doit comporter au moins 3 caractères.',
                'date_debut.required' => 'Le champ Date de début du Projet est requis.',
                'date_fin.required' => 'Le champ Date de fin du Projet est requis.',
            ]
        );
    }








    // function getPreviewIconForFile($fileExtension, $filePath)
    // {
    //     if ($fileExtension === 'pdf') {
    //         // Chemin de l'aperçu généré
    //         $previewPath = "/storage/previews/preview_$fileExtension.png";

    //         // Vérifiez si l'aperçu existe, sinon générez-le
    //         if (!file_exists(public_path($previewPath))) {
    //             // Utilisez Ghostscript pour extraire la première page du PDF
    //             $command = "gs -dNOPAUSE -sDEVICE=pngalpha -r300 -o " . public_path($previewPath) . " " . public_path($filePath) . "[0]";
    //             shell_exec($command);
    //         }

    //         return $previewPath;
    //     } else {
    //         // Pour d'autres types de fichiers, utilisez l'icône générique
    //         return 'logo.png'; // Utilisez une icône générique par défaut
    //     }
    // }


}
