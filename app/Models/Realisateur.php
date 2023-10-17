<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Realisateur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_realisateur'
    ];
    public function projets()
    {
        return $this->belongsToMany(Realisateur::class, 'projet_realisateurs', 'id_projet', 'id_realisateur');
    }
}
