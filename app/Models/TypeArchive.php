<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeArchive extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_type'
    ];

    protected $primaryKey='id';
    protected $table="type_archives";

    public function archive():HasMany
    {
        return $this->hasMany(Archive::class,'id_archive');
    }
}



