<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot as RelationsPivot;

class ProjetPrealisateur extends RelationsPivot
{

    use HasFactory;
protected $primaryKey=['id_projet', 'id_realisateur'];


}
