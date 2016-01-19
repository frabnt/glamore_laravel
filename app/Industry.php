<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $table ='industries'; // nome tabella sul db
    public $timestamps= false;


    // relazione uno a molti
    public function user(){
        return $this->belongsTo('App\User');
    }
}
