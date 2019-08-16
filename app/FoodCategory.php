<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    protected $table = 'menu_category';
    protected $fillable =['food_category'];
    public $timestamps = false;
}
