<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    // Relacion polimorfica - mismo nombre que el de la E.R polimorfica
    public function imageable() {
        return $this->morphTo();
    }
}