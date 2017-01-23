<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $fillable = [
      'invoice_number',
      'description',
      'rate',
      'quantity',
      'sub_total',
      'discount',
      'grand_total',
      'invoice_date',
      'due_date',
      'token',
      'status',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'user_id',
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }
}
