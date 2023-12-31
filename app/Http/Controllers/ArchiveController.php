<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Fichier;
use App\Models\TypeArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archives=Archive::latest()->get();
     //   dd($archives[0]->titre_archives);


    //  foreach ($archives as $archive) {
    //     // Accédez aux fichiers associés à chaque archive
    //     $fichiers = $archive->fichiers;

    //     // Utilisez un dump and die (dd) pour afficher les fichiers pour chaque archive
    //     dd($fichiers);
    // }


        return view("archives.index", compact("archives"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_archive=TypeArchive::all();
        //dd($type_archive[0]->nom_type);
       return view("archives.create", compact('type_archive'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request['id_user']=Auth::user()->id;
      //  dd(request());
        //dd($request->id_type_archive);
        $request->validate(Archive::rules());
        // Archive::create([
        //     //'titre_archives' => $request->input('titre_archives'),
        //    // 'id_user'=>Auth::user()->id
        // ]);


        $archive = Archive::create($request ->all());
      //  $projets = Projet::create($request->all());
       //  dd($request->file('fichier_archives'));
     $archive->add_file($request);
      //dd($request->all());
      return redirect()->route('archive.index')->with('success', 'Consultant supprimé avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Archive $archive)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archive $archive)
    {
    //dd($archive->all());
        $type_archive=TypeArchive::all();
        //dd($type_archive[0]->nom_type);
       // dd($type_archive->);
      // $fichier=Fichier::all();
     //  dd($fichier[0]);
       // dd($archive[1]);

       $fichier=Fichier::all();
       return view('archives.edit',compact('archive', 'type_archive', 'fichier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archive $archive)
    {
        //
        $request->validate(Archive::rules());

        $archive->update($request->all());
        $archive->add_file($request);
        //dd($archive->fichiers);
       // dd($archive);
        return redirect()->route('archive.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archive $archive)
    {
        $archive->delete_file();

        $archive->delete();
        return redirect()->route('archive.index')->with('success', 'Consultant supprimé avec succès.');
    }
}
