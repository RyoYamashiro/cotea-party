<?php

namespace App\Http\Controllers;

use App\Party;
use App\Http\Requests\PartyRequest;
use Carbon\Carbon;


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
    $party->save();
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
    return view('parties.show', compact('party'));
  }
  public function destroy(Party $party)
  {
    $party->delete();
    return redirect()->route('parties.index');
  }
}
