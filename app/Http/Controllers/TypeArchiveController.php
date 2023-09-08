<?php

namespace App\Http\Controllers;

//use App\Models\Type_archive;
use Illuminate\Http\Request;
use App\Models\TypeArchive;

class TypeArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //  dd('baki');

        $type_archives=TypeArchive::all();
        //dd($type_archive);
        return view('type_archive.index', compact('type_archives'));
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
        //
        $type=TypeArchive::create($request->all());
        return redirect()->route('type_archive.index')->with('success', 'Consultant supprimé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Type_archive $type_archive)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
     public function edit(TypeArchive $type_archive)
    {
      // dd($type_archive);
        $id_archive=$type_archive;
        return view('type_archive.edit', compact('id_archive'));

     }

    // /**
    //  * Update the specified resource in storage.
    //  */
     public function update(Request $request, TypeArchive $type_archive)
     {
        $type_archive->update($request->all());
        return redirect()->route('type_archive.index');
     }

    // /**
    //  * Remove the specified resource from storage.
    //  */
     public function destroy(TypeArchive $type_archive)
    {
        $type_archive->delete();
        return redirect()->route('type_archive.index')->with('success', 'Consultant supprimé avec succès.');


    }
}
