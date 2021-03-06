<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
      'role_id',
      'company_id',
      'first_name',
      'last_name',
      'email',
      'phone',
      'avatar_url',
      'password',
      'token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'token',
    ];
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /*
      Returns full name
     */
    public function fullName()
    {
        $fullName = $this->first_name.' '.$this->last_name;

        return $fullName;
    }
}
