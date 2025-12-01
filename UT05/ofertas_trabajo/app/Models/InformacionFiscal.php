<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionFiscal extends Model
{
    /** @use HasFactory<\Database\Factories\InformacionFiscalFactory> */
    use HasFactory;

    protected $table = 'informaciones_fiscales';

    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }
}
