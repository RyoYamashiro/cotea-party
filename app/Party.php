<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Party extends Model
{
  protected $dates = [
    'date',
  ];
  protected $fillable = [
    'title',
    'address',
    'lat',
    'lng',
    'date',
    'shopname',
    'content',
  ];
  public function user(): BelongsTo
  {
      return $this->belongsTo('App\User');
  }
  public function subscribesToParty() {
    return $this->hasMany('App\Subscribe','party_id');
  }
}
