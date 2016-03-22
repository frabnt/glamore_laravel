<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'terms_agreement', 'last_name'
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

       public function todos()
       {
           return $this->hasMany('App\Todo');
       }


}
