<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departement extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_departement'
    ];
    protected $primaryKey='id';
    protected $table="archives";

    public function archive():HasMany
    {
        return $this->hasMany(Archive::class,'id_archive');
    }
}
