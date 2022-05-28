<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
  public function party() {
    return $this->belongsTo('App\Party', 'party_id');
  }
  public function user() {
    return $this->belongsTo('App\User', 'user_id');
  }
}
