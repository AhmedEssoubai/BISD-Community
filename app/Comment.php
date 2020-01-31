<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comment';
    public $timestamps = false;
    protected $fillable = ['content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'compte_id');
    }

    public function childComment()
    {
        return $this->hasMany(Comment::class);
    }

    public function parentComment()
    {
        return $this->belongsTo(Comment::class);
    }
}
