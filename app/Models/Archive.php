<?php

namespace App\Models;

use App\Models\Fichier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
         foreach($this->fichiers as $fichier){
           $fichier->delete();
         }
    }
}
