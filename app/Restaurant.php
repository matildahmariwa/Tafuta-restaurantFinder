<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
   //Table name
   protected $table='restaurants';
    
   //Primary key
   public $primarykey='id';

   //Timestamps
   public $timestamps=true;
}
