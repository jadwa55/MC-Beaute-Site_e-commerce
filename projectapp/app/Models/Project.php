<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $casts = [
        'quantite' => 'float'
    ];

    protected $fillable = [
        'name',
        'introduction',
        'category_id',
        'image',
        'quantite',
        'cost'
    ];

    // public function categoryinfo()
    // {
    //     return $this->hasOne(Category::class,'id');
    // }

}
