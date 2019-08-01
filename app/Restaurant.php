<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;

class Restaurant extends Model
{
   //Table name
   protected $table='restaurants';
    
   //Primary key
   public $primarykey='id';

   //Timestamps
   public $timestamps=true;

   public function reviews(){
      return $this->hasMany('App\Review');
  }
  protected $appends = ['rating_count'];

public function getRatingCountAttribute()
{
    return $this->reviews->avg('rating');
}
}
