<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Groupe;

class Post extends Model
{

    protected $table = 'post';
    public $timestamps = false;
    protected $fillable = ['content'];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    /**
     * post can be added to favorit by many user
     * 
     */
    public function compte()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The post can be published by one user
     * 
     */
    public function publisher()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
