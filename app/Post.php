<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'post';
    public $timestamps = false;
    protected $fillable = ['content'];

    public function groupe() {
        return $this->hasOne(App\Groupe::class);
    }

    public function tag() {
        return $this->hasMany(App\Tag::class);
    }

    /**
     * post can be added to favorit by many user
     * 
     */
    public function compte() {
        return $this->hasMany(App\User::class);
    }

    /**
     * The post can be published by one user
     * 
     */
    public function publisher() {
        return $this->belongsTo(App\User::class);
    }

    public function comments() {
        return $this->hasMany(App\Comment::class);
    }
}
