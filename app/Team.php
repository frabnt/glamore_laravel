<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table ='teams'; // nome tabella sul db
    public $timestamps= false;



    // one to many educations
       public function projects()
       {
           return $this->belongsTo('App\Project');
       }
}
