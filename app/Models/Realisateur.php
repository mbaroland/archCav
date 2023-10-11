<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Realisateur extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_realisateur'
    ];
    public function realisateur()
    {
    return $this->BelongsToMany(Projet::class);
    }
}
