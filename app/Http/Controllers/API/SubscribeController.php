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
  //   public function index(int $id){
  //   if(Auth::id() === Party::find($id)->user_id){
  //     $query = Subscribe::query();
  //     $query->where('party_id', $id)
  //     $subscribes = $query->get();
  //     return $subscribes;
  //   }
  // }

  public function show($party_id, $user_id)
  {
    $query = Subscribe::query();

    $query->where('party_id', $party_id);
    // Reactで生成したボタンから情報を得る
    $query->where('user_id', $user_id);
    $subscribe = $query->first();
    if($subscribe){

    }else{
      return null;

    }


    // そこからreact内でJSONのステータス情報をもとにボタンのスタイルと文字を生成
  }
  public function update(Request $request)
  {
    $party_id = intval($request->party_id);
    $user_id = intval($request->user_id);
    $status = intval($request->status);

    $query = Subscribe::query();
    $query->where('user_id',$user_id);
    $query->where('party_id',$party_id);
    $data = $query->first();
    if(!isset($data)) {
        $data = new Subscribe();
        $data->user_id = $user_id;
        $data->party_id = $party_id;
        $data->status = $status;
        $data->message = 'おはよう';
        $data->save();
    }else{
      logger($status);
      $data->status = $status;
      logger($data);

      $data->save();

    }
  }
}
