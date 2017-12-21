<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //Table Name
    protected $table = 'Material';
    //Primary Key
    public $primaryKey = 'materialId';
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
