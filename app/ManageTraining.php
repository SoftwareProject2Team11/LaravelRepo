<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageTraining extends Model
{
    //Table Name
    protected $table = 'Training_Requests';
    //Primary Key
    public $primaryKey = 'requestId';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
