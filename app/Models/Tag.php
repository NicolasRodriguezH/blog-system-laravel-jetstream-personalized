<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Se declara propiedad para asigancion masiva, con nombre $fillable
    protected $fillable = [
        'name',
        'slug',
        'color'
    ];

    // SLUG - URL amigables
    public function getRouteKeyName() {
        return 'slug';
    }

    // Relacion muchos a muchos / Bug solucionado, estaba como belongsTo y posts a tags es, muchos a muchos
    public function posts() {
        return $this->belongsToMany(Post::class);
    }
}
