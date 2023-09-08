<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategorieProjet extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_categorie'

    ];
    protected $primaryKey='id';
    protected $table = "categorie_projets";

    public function projet():HasMany
    {

        return $this->hasMany(Projet::class,'id_projet');
    }
}
