<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especulador extends Model
{
    /** @use HasFactory<\Database\Factories\EspeculadorFactory> */
    use HasFactory;

    public function zulos()
    {
        return $this->hasMany(Zulo::class);
    }
}
