<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingRequest extends Model
{
    //Table Name
    protected $table = 'Training_Requests';
    //Primary Key
    public $primaryKey = 'trainingId';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
