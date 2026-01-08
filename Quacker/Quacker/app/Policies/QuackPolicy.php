<?php

namespace App\Policies;

use App\Models\Quack;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuackPolicy
{
    public function manage(User $user, Quack $quack)
    {
        return $user->id === $quack->user_id;
    }
}
