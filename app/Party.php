<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Party extends Model
{
  protected $dates = [
    'date'
  ];
  protected $fillable = [
    'title',
    'address',
    'shopname',
    'content',
  ];
  public function user(): BelongsTo
  {
      return $this->belongsTo('App\User');
  }
}
