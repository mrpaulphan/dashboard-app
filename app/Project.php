<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
      'company_id', 'name', 'slug'
    ];
    public function users() {
      return $this->belongsToMany('App\User', 'project_user')->withTimestamps();
    }


    public function company() {
      return $this->belongsTo('App\Company');
    }
}
