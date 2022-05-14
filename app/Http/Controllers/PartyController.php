<?php

namespace App\Http\Controllers;

use App\Party;
use App\Http\Requests\PartyRequest;

use Illuminate\Http\Request;

class PartyController extends Controller
{
  public function index()
  {
    $parties = Party::all()->sortByDesc('created_at');

    return view('parties.index', compact('parties'));
  }
  public function create()
  {
    return view('parties.create');
  }
  public function store(PartyRequest $request, Party $party)
   {
       $party->fill($request->all());
       $party->user_id = $request->user()->id;
       $party->save();
       return redirect()->route('parties.index');
   }
}
