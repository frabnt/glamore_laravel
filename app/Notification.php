<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table ='notifications'; // nome tabella sul db

    public function users()
       {
           return $this->belongsToMany('App\User', 'user_notification');
       }
}
