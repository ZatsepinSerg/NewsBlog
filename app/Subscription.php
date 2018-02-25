<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Subscription extends Model
{

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function addSubscription(){

    }

    public function getAllSubscriptionsFromUser($id){


      $result = Subscription::where('user_id','=',$id)->get();

        return $result;
    }

}
