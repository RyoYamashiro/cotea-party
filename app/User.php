<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name', 'email', 'self_introduction', 'gender', 'birthday', 'password'
    ];

    private static $setGender = [
        null => '--', 0 => '男', 1 => '女'
    ];
    public function getGender()
    {
      return self::$setGender[$this->gender];
    }




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
    /**
      * パスワードリセット通知の送信
      *
      * @param  string  $token
      * @return void
      */
    public function sendPasswordResetNotification($token)
    {
      logger('$token:'.$token);
      $this->notify(new ResetPasswordNotification($token));
    }

    public function subscribesToUser() {
      return $this->hasMany('App\Subscribe','user_id');
    }
}
