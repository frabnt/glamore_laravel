<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //
    protected $table ='experiences'; // nome tabella sul db
    public $timestamps= false;

   // relazione uno a molti
    public function user(){
        return $this->belongsTo('App\User');
    }
}
