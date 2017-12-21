<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    //Table Name
    protected $table = 'trainings';
    //Primary Key
    public $primaryKey = 'trainingId';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
