<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function articles()
    {
        return $this->belongsTo(Article::Class);
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
