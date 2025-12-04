<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /** @use HasFactory<\Database\Factories\EmpresaFactory> */
    use HasFactory;

    public function ofertas()
    {
        return $this->hasMany(Oferta::class);
    }

    public function informacionFiscal()
    {
        return $this->hasOne(InformacionFiscal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
