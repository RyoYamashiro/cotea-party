<?php

namespace App\Http\Controllers;

use App\Party;
use App\User;
use App\Subscribe;

use App\Http\Requests\PartyRequest;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class PartyController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Party::class, 'party');
  }
  protected function validator(array $data)
  {
      return Validator::make($data,[
          'message' => 'max:20',
          ]);
  }
  public function index()
  {
    $totalPageNumber = Party::all()->load(['user'])->count();
    $partyPageNumber = ceil($totalPageNumber/ 12);
    return view('parties.index', compact('partyPageNumber'));
  }
  public function create()
  {
    $party = null;
    return view('parties.create', compact('party'));
  }
  public function store(PartyRequest $request, Party $party)
  {
    $party->title = $request->title;
    $party->date = date( 'Y-m-d H:i:s', strtotime( $request->date ) );
    $party->address = $request->address;
    $party->lat = $request->lat;
    $party->lng = $request->lng;
    $party->shopname = $request->shopname;
    $party->content = $request->content;
    $party->user_id = $request->user()->id;
    $party->save();

    return redirect()->route('parties.index')->with('flash_message','パーティーを登録しました。');
  }
  public function edit(Party $party)
  {
    $date = $party->date->format('Y-m-d\TH:i');
    logger($date);
    return view('parties.edit', compact('party', 'date'));
  }
  public function update(PartyRequest $request, Party $party)
  {
    $party->title = $request->title;
    $party->date = date( 'Y-m-d H:i:s', strtotime( $request->date ) );
    $party->address = $request->address;
    $party->lat = $request->lat;
    $party->lng = $request->lng;
    $party->shopname = $request->shopname;
    $party->content = $request->content;

    $party->save();
    return redirect()->route('parties.index')->with('flash_message','パーティーを更新しました。');;
  }
  public function show(Party $party)
  {
    $query = Subscribe::query();
    $query->where('user_id', Auth::id());
    $query->where('party_id', $party->id);
    $subscribe = $query->first();
    return view('parties.show', compact('party', 'subscribe'));
  }
  public function destroy(Party $party)
  {
    $party->delete();
    return redirect()->route('parties.index');
  }
  public function getSubscribeIndex($party_id){
    if(auth()->id() === Party::find($party_id)->user_id){
      $subscribes = Subscribe::join('users', 'subscribes.user_id', '=', 'users.id')
      ->where('subscribes.party_id', '=', $party_id)->get();
      logger($subscribes);
      return $subscribes;
    }
  }
  public function updateSubscribe(Request $request)
  {

    $party_id = intval($request->party_id);
    $user_id = intval($request->user_id);
    $status = intval($request->status);
    $query = Subscribe::query();
    $query->where('user_id', $user_id);
    $query->where('party_id', $party_id);
    $data = $query->first();
    $flash_message = '申請しました。';
    if(!isset($data)) {
      $data = new Subscribe();
      $data->user_id = $user_id;
      $data->party_id = $party_id;
      $data->status = $status;
      $data->message = $request->message;
      $data->save();
    }else{
      $request->message ? $data->message = $request->message: $data->message = '';
      $data->status = $status;
      $data->save();
      if($status === 0){
        $flash_message = '申請取り消ししました。';
      }

    }
    return redirect()->route('parties.show', $party_id)->with('flash_message', $flash_message);
  }
}
