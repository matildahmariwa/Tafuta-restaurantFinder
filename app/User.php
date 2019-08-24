<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reviews(){
        return $this->hasMany('App\Review');
    }
    //check if user is admin
    public function isSuperAdmin() : bool
    {
        return (bool) $this->is_super_admin;
    }
    //create admin
    public function createSuperAdmin(array $details) : self
    {
        $user = new self($details);
        if (! $this->superAdminExists()) {
            $user->is_super_admin = 1;
        }
        $user->save();
        return $user;
    }
    public function superAdminExists() : int
    {
        return self::where('is_super_admin', 1)->count();
    }

}
