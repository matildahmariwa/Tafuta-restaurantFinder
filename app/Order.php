<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name',''];

    public function foods(){
        return $this->hasMany('App\Food');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}
