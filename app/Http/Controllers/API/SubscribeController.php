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
  public function index(int $id){
    if(Auth::id() === Party::find($id)->user_id){
      $query = Subscribe::query();
      $query->where('party_id', $id)
      $subscribes = $query->get();
      return $subscribes;
    }
  }

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
  public function store(Request $request)
  {
    $party = Party::find($request->party_id);
        $query = Subscribe::query();
        $query->where('user_id',$request->user_id);
        $query->where('party_id',$request->party_id);
        $query->where('status',$request->status);
        $data = $query->first();
        if (!isset($data)) {
            $data = new Subscribe();
            $data->user_id = $request->user_id;
            $data->party_id = $request->party_id;
            $data->status = $request->status;
        }
        $data->message = $request->message;
        $party_id = $data->party_id;
        $user_id = $data->user_id;
        $message = $data->message;
        if ($request->status == 1) {
            $data->save();
            // return view('subscribes.store',compact('party','message','party_id','user_id'));
        } else if ($request->status == 3) {
            $query = Subscribe::query();
            $query->where('party_id',$party_id);
            $query->where('user_id',$user_id);
            $query->where('status',2);
            $subscribe = $query->first();
            if (isset($subscribe)) {
                $subscribe->status = 0;
                $subscribe->save();
            }
            // return $this->index();
        }
  }
}
