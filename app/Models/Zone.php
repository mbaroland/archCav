<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Zone extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_zone'

    ];
    protected $primaryKey='id';
    protected $table = "zones";

    public function projets():HasMany
    {

        return $this->hasMaHny(Projet::class,'id_zone');
    }
    
}
