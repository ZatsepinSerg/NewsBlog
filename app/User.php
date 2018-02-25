<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','articles_count','subscriptions_count','activationCode','isActive'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::Class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::Class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::Class);
    }

    public function getQualifiedKeyName()
    {
        return 'name';
    }

    public function articleCounter($id){
        User::where('id',$id)->increment('articles_count');
    }


}
