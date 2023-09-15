<?php

namespace App\Models;

use App\Models\Fichier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Archive extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre_archives', 'id_type_archive', 'id_user', 'id_archive'
    ];
    protected $primaryKey = 'id';

    public function type_archive(): BelongsTo
    {

        return $this->belongsTo(TypeArchive::class, 'id_type_archive');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // public function departement(): BelongsTo
    // {
    //     return $this->belongsTo(Departement::class, 'id_departement');
    // }

    public function fichiers(): HasMany
    {
        return $this->hasmany(Fichier::class, 'id_archive');
    }

    public function add_file($request){
        $i=0;
        if ($request->file('fichier_archives') ){
            $this->delete_file();
            foreach($request->file('fichier_archives') as $file){
                $path=$this->titre_archives.++$i.".".$file->extension();
                $path="archives/".$path;
                //dd($this);
                $file->storeAs('public/',$path );
                Fichier::create(
                    [
                        'nom_fichier'=>$path,
                        'id_archive'=>$this->id,
                    ]
                    );
               }
           }
    }
    public function delete_file(){
       // dd($this->fichiers);
         foreach($this->fichiers as $fichier){
            dd($fichier);
           $fichier->delete();
         }
    }

    public static function rules()
    {
        return [
            'titre_archives' => [
                'required', // Le champ est requis
                'min:3',    // Au moins 3 caractères
            ],
            // Ajoutez d'autres règles de validation pour les autres champs si nécessaire
        ];
    }
    public static function messages()
    {
        return [
            'titre_archives.required' => 'Le champ "Nom de l\'archive" est obligatoire.',
            'titre_archives.min' => 'Le "Nom de l\'archive" doit avoir au moins :min caractères.',
            // Personnalisez les messages pour les autres règles au besoin.
        ];
    }




}




