<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table ='roles'; // nome tabella sul db

    public function permissions()
       {
           return $this->belongsToMany('App\Permission', 'role_permission');
       }
}
