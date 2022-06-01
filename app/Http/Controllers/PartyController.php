<?php

namespace App\Http\Controllers;

use App\Party;
use App\Subscribe;

use App\Http\Requests\PartyRequest;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PartyController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Party::class, 'party');
  }
  public function index()
  {

    $totalPageNumber = Party::all()->count();
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
    if ($request->func == 1) {
      $data->save();
    }else if ($request->func == 2){
      $query = Subscribe::query();
      $query->where('job_id',$data->id);
      $query->where('status','<>',1);
      if ($query->count() == 0) {
          $query = Subscribe::query();
          $query->where('job_id',$data->id);
          $query->where('user_id',$request->user_id);
          $query->where('status',1);
          $subscribes = $query->first();
          if (isset($subscribes)) {
              //決定する人が特定できた時
              $subscribes->status = 2;
              $subscribes->save();
          }
      }
    }
    return redirect()->route('parties.index');
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
    return redirect()->route('parties.index');
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
}
