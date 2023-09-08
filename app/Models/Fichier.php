<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Fichier extends Model
{
    use HasFactory;
    protected $fillable=[
       'nom_fichier',
       'id_projet',
       'id_archive',


    ];

    public function projet():BelongsTo
    {

        return $this->belongsTo(Projet::class,'id_projet');
    }

    public function archive():BelongsTo
    {

        return $this->belongsTo(Archive::class,'id_archive');
    }


}
