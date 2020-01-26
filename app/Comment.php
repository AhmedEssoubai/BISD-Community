<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comment';
    public $timestamps = false;
    protected $fillable = ['content'];

    public function post() {
        return $this->belongsTo(App\Post::class);
    }
}
