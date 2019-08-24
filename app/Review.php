<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Restaurant;
use App\User;

class Review extends Model
{
     //Table name
   protected $table='reviews';

   //Primary key
   public $primarykey='id';

   //Timestamps
   public $timestamps=true;

   protected $fillable = [
      'user_id', 'title', 'restaurant_id', 'rating', 'review', 'visit_type'
   ];



 public function user(){
    return $this->belongsTo('App\User');
 }
 public function restaurant(){
    return $this->belongsTo('App\Restaurant');
 }
 

}
