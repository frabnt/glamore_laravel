<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
	protected $table ='educations'; // nome tabella sul db
	public $timestamps= false;



    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
