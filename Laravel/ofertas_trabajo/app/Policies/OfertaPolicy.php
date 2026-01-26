<?php

namespace App\Policies;

use App\Models\Oferta;
use App\Models\User;

class OfertaPolicy
{
    public function manage(User $user, Oferta $oferta)
    {
        return $oferta->empresa->user->id == $user->id;
    }
}
