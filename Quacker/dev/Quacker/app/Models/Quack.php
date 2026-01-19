<?php

namespace App\Models;

use function count;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quack extends Model
{
    /** @use HasFactory<\Database\Factories\QuackFactory> */
    use HasFactory;

    protected $fillable = ['content', 'user_id'];

    public function isQuavedBy(User $user)
    {
        // https://stackoverflow.com/questions/38686188/check-if-user-liked-post-laravel
        return $this->quavs()->where('user_id', $user->id)->exists();
    }

    public function isRequackedBy(User $user)
    {
        // https://stackoverflow.com/questions/38686188/check-if-user-liked-post-laravel
        return $this->requacks()->where('user_id', $user->id)->exists();
    }

    public function getQuavs()
    {
        return count($this->quavs);
    }

    public function getRequacks()
    {
        return count($this->requacks);
    }

    public function getComments()
    {
        return 0;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quashtags()
    {
        return $this->belongsToMany(Quashtag::class);
    }

    public function quavs()
    {
        return $this->belongsToMany(User::class, 'quavs');
    }

    public function requacks()
    {
        return $this->belongsToMany(User::class, 'requacks');
    }
}
