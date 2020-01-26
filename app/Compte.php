<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    //

    public function post() {
        return $this->hasMany(App\Post::class);
    }
}
