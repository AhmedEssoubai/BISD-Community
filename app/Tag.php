<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tag';
    protected $fillable = ['label'];

    public function post()
    {
        return $this->belongsToMany(Post::class, 'post_tags');
    }
}
