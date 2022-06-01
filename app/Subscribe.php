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
  private static $setStatus = [
      null => '未申請', 0 => '未申請', 1 => '申請中', 2 => '参加予定'
  ];
  public function getStatus()
  {
    return self::$setStatus[$this->status];
  }
}
