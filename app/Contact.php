<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table ='contacts'; // nome tabella sul db
    public $timestamps= false;  // inibisce i time stamps
}
