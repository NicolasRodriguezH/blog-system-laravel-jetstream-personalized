<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Aca "debemos" habilitar la asignacion masiva para category, en el modelo, y se hace a continuacion
    protected $fillable = ['name', 'slug'];

    // Se genera Slug para la URL sirve para las direcciones amigables en buscadores web
    public function getRouteKeyName() {
        return 'slug';
    }

    // Relacion uno a muchos
    Public function posts() {
        return $this->hasMany(Post::class);
    }
}
