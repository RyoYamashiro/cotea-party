<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Party;
use App\User;
use App\Subscribe;


class PartiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($index)
    {
      $parties = Party::orderBy('created_at', 'DESC')->offset($index*12)->take(12)->get();
      return $parties;
    }
    public function getUserParties(User $user)
    {
      $postedParties = Party::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

      $joinParties = Subscribe::join('parties', 'subscribes.party_id', '=', 'parties.id')->where('subscribes.user_id', $user->id)->orderBy('parties.created_at', 'DESC')->where('subscribes.status', '=', 2)->get();

      $applyParties = Subscribe::join('parties', 'subscribes.party_id', '=', 'parties.id')->where('subscribes.user_id', $user->id)->orderBy('parties.created_at', 'DESC')->where('subscribes.status', '=', 1)->get();

      return [
        'postedParties' => $postedParties,
        'joinParties' => $joinParties,
        'applyParties' => $applyParties
      ];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
