<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCommande extends Model
{
    use HasFactory;


    protected $table = 'project_commande';


    protected $fillable = [
        'quantite',
        'commande_id',
        'project_id'
    ];
}

