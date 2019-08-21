<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
  //Table name
  protected $table='foods';
    
  //Primary key
  public $primarykey='id';
  
  public function restaurant(){
    return $this->belongsTo('App\Restaurant');
 }
}
