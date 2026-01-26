<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    /** @use HasFactory<\Database\Factories\OfertaFactory> */
    use HasFactory;

    protected $fillable = ['titulo', 'empresa', 'descripcion'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function candidatos()
    {
        return $this->belongsToMany(User::class, 'candidaturas')->withTimestamps();
    }

}
