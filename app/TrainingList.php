<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingList extends Model
{
    //Table Name
    protected $table = 'Training';
    //Primary Key
    public $primaryKey = 'trainingId';
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
