<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;
use App\Models\Fichier;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_categorie', 'id_categorie', 'id_user',
        'titre_projet',
        'objectif_global',
        'objectif_specifiques',
        'financement',
        'budjet',
        'zone',
        'date_debut',
        'date_fin',


    ];
    protected $casts = [
        "date_debut" => "datetime",
        "date_fin" => "datetime",
        "financement" => "array"
    ];
    public function categorie_projet(): BelongsTo
    {

        return $this->belongsTo(CategorieProjet::class);
    }

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class);
    }

    public function realisateur(): BelongsToMany
    {
        return $this->BelongsToMany(Realisateur::class);
    }


    public function fichiers(): HasMany
    {
        return $this->hasMany(Fichier::class, 'id_projet');
    }


    public function find_duration()
    {
        $debut = Carbon::parse($this->date_debut);
        $fin = Carbon::parse($this->date_fin);
        $duration = $debut->diffInMonths($fin);
        return ($duration);
    }
    public function add_pojet($request)
    {
        $i = 0;
        //dd($request->all());
        $request->file('fichier_projet');
        foreach ($request->file('fichier_projet') as $file) {

            $orginalName = $file->getClientOriginalName();
            $path =  $orginalName;
            $path = "fichier/" . $path;
            // dd($path);

            $file->storeAs('public/', $path);
            Fichier::create(
                [
                    'nom_fichier' => $path,
                    'id_projet' => $this->id,
                ]
            );
        }
    }


    function getPreviewIconForFile($fileExtension, $filePath)
    {
        if ($fileExtension === 'pdf') {
            // Chemin de l'aperçu généré
            $previewPath = "/storage/previews/preview_$fileExtension.png";

            // Vérifiez si l'aperçu existe, sinon générez-le
            if (!file_exists(public_path($previewPath))) {
                // Utilisez Ghostscript pour extraire la première page du PDF
                $command = "gs -dNOPAUSE -sDEVICE=pngalpha -r300 -o " . public_path($previewPath) . " " . public_path($filePath) . "[0]";
                shell_exec($command);
            }

            return $previewPath;
        } else {
            // Pour d'autres types de fichiers, utilisez l'icône générique
            return 'logo.png'; // Utilisez une icône générique par défaut
        }
    }

    public function getRealisateursList()
    {
        $realisateurs = $this->realisateur; // Relation many-to-many
        $realisateursList = $realisateurs->pluck('nom_realisateur')->implode(', ');

        return $realisateursList;
    }


    public static function rules()
    {
        return [
            'titre_projet' => [
                'required', // Le champ est requis
                'min:3',    // Au moins 3 caractères
            ],
            // Ajoutez d'autres règles de validation pour les autres champs si nécessaire
            'objectif_global' => [
                'required', 'min:3',
            ],
            // Ajoutez d'autres règles de validation pour les autres champs si nécessaire
            'objectif_specifiques' => [
                'required', 'min:3',
            ],
            // Ajoutez d'autres règles de validation pour les autres champs si nécessaire
            // 'financement' => [
            //     'required', 'min:3',
            // ],
            // Ajoutez d'autres règles de validation pour les autres champs si nécessaire
            'budjet' => [
                'required',
                'numeric',
            ],
            'date_debut' => [
                'required',
                'date',
                'before_or_equal:date_fin', // Ajoutez cette règle pour vérifier si la date de début est avant ou égale à la date de fin
            ],
            // Ajoutez d'autres règles de validation pour les autres champs si nécessaire
            'date_fin' => [
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
            'objectif_specifiques.required' => 'Le champ objectif_specifiques" est obligatoire.',
            'objectif_specifiques.min' => 'Le champs objectif_specifiques" doit avoir au moins :min caractères.',
            // 'financement.required' => 'Le champ "financement" est obligatoire.',
            // 'financement.min' => 'Le champs"financement" doit avoir au moins :min caractères.',
            'budjet.required' => 'Le champ "budjet" est obligatoire.',
            'budjet.min' => 'Le champs "budjet" doit avoir au moins :min caractères.',
            'date_debut.required' => 'Le champ "Date de début" est obligatoire.',
            'date_debut.date' => 'Le champ "Date de début" doit être une date valide.',
            'date_debut.before_or_equal' => 'La date de début doit être antérieure ou égale à la date de fin.',
            'date_fin.required' => 'Le champ "Date de fin" est obligatoire.',
            'date_fin.min' => 'Le champ "Date de fin" doit avoir au moins :min caractères.',


            // Personnalisez les messages pour les autres règles au besoin.
        ];
    }
}
