<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zulo extends Model
{
    /** @use HasFactory<\Database\Factories\ZuloFactory> */
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'ubicacion', 'precio', 'superficie', 'especulador_id'];

    public function especulador()
    {
        return $this->belongsTo(Especulador::class);
    }

    public function interesados()
    {
        return $this->belongsToMany(User::class, 'interesados');
    }
}
