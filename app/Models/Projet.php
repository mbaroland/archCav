<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;
use App\Models\Fichier;

class Projet extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom_categorie', 'id_categorie','id_user',
        'titre_projet',
        'objectif_global',
        'objectif_specifiques',
        'financement',
        'budjet',
        'zone',
        'date_debut',
        'date_fin',


    ];
    protected $casts=["date_debut"=>"datetime",
    "date_fin"=>"datetime"
];
    public function categorie_projet():BelongsTo
    {

        return $this->belongsTo(CategorieProjet::class);
    }

    public function user():BelongsTo
    {

        return $this->belongsTo(User::class);
    }

    public function realisateur():HasMany
    {
    return $this->hasmany(Realisateur::class);
    }


    public function fichiers():HasMany
    {
    return $this->hasMany(Fichier::class, 'id_projet');
    }


    public function find_duration()
    {
       $debut= Carbon::parse($this->date_debut);
       $fin= Carbon::parse($this->date_fin);
       $duration= $debut->diffInMonths($fin) ;
        return($duration);
    }
    public function add_pojet($request){
        $i=0;
        //dd($request->all());
        if ($request->file('fichier_projet') ){
         foreach($request->file('fichier_projet') as $file){

             //dd($file);
             $path=$this->titre_projet.++$i.".".$file->extension();
             $path="fichier/".$path;
             // dd($path);

             $file->storeAs('public/',$path );
             Fichier::create(
                 [
                     'nom_fichier'=>$path,
                     'id_projet'=>$this->id,
                 ]
                 );
            }
        }else{
         dd('save');
        }

    }

}




