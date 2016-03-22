<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table ='projects'; // nome tabella sul db
    public $timestamps= false;


    // relazione uno a molti
    public function user(){
        return $this->belongsTo('App\User');
    }
    // relazione uno a molti
    public function team(){
        return $this->belongsTo('App\Team');
    }

    public function todos()
       {
           return $this->hasMany('App\Todo');
       }
}
