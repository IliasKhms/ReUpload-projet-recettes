<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'id_recipe'];

    public function recipe()
    {
        return $this->belongsTo('App\Models\Recipe', 'id_recipe');
    }
}
