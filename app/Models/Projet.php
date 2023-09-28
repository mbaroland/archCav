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
        $request->file('fichier_projet');
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

    }


<<<<<<< HEAD

    public static function rules()
    {
        return [
            'titre_projet' => [
                'required', // Le champ est requis
                'min:3',    // Au moins 3 caractères
            ],
            // Ajoutez d'autres règles de validation pour les autres champs si nécessaire
            'objectif_global'=>[
                'required', 'min:3',
            ],

        ];
    }
    public static function messages()
    {
        return [
            'titre_projet.required' => 'Le champ "Nom de l\'archive" est obligatoire.',
            'titre_projet.min' => 'Le "Nom de l\'archive" doit avoir au moins :min caractères.',
            'objectif_global.required' => 'Le champ "objectif_global" est obligatoire.',
            'objectif_global.min' => 'Le "objectif_global" doit avoir au moins :min caractères.',
            // Personnalisez les messages pour les autres règles au besoin.
        ];
    }


=======
    

    
>>>>>>> 903434d957abc34bed8ea0d420abade2ed5f8c48

}




