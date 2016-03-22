<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table ='todos'; // nome tabella sul db
    public $timestamps= false;

    // one to many educations
    public function projects()
    {
        return $this->belongsTo('App\Project');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
