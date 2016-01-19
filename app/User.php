<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{

    use Messagable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    // one to many educations
       public function educations()
       {
           return $this->hasMany('App\Education');
       }
       // one to many industries
       public function industries()
       {
           return $this->hasMany('App\Industry');
       }
       // one to many educations
       public function experiences()
       {
           return $this->hasMany('App\Experience');
       }



}
