<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'website',
    'street_address',
    'street_address_2',
    'city',
    'state',
    'zip_code',
    'email',
    'phone',
  ];
}
