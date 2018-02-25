<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id','article_id','parent_id','body'];

    public function articles()
    {
        return $this->belongsTo(Article::Class);
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
