<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body'];


    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::Class);
    }

}
