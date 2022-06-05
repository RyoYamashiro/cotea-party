<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Party;
use App\Subscribe;


class SubscribeController extends Controller
{


  public function show($party_id, $user_id)
  {
    $party = Party::find($party_id);
    $query = Subscribe::query();
    $query->where('party_id', $party_id);
    $query->where('user_id', $user_id);
    $subscribe = $query->first();
    if($party->user_id === intval($user_id)){
      $isLoggedin = true;
    }else{
      $isLoggedin = false;
    }

    if($subscribe){
      return
        array("subscribe" => $subscribe,"isLoggedin" => $isLoggedin);
    }else{
      return array("subscribe" => null,"isLoggedin" => $isLoggedin);
    }
  }
  public function update($party_id, $user_id, $status)
  {
    $party_id = intval($party_id);
    $user_id = intval($user_id);
    $status = intval($status);

    $query = Subscribe::query();
    $query->where('user_id',$user_id);
    $query->where('party_id',$party_id);
    $data = $query->first();
    $data->status = $status;

    $data->save();

  }
}
