<?php

namespace App\Policies;

use App\Party;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any parties.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
      return true;
    }

    /**
     * Determine whether the user can view the party.
     *
     * @param  \App\User  $user
     * @param  \App\Party  $party
     * @return mixed
     */
    public function view(?User $user, Party $party)
    {
      return true;
    }

    /**
     * Determine whether the user can create parties.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      return true;
    }

    /**
     * Determine whether the user can update the party.
     *
     * @param  \App\User  $user
     * @param  \App\Party  $party
     * @return mixed
     */
    public function update(User $user, Party $party)
    {
      return $user->id === $party->user_id;
    }

    /**
     * Determine whether the user can delete the party.
     *
     * @param  \App\User  $user
     * @param  \App\Party  $party
     * @return mixed
     */
    public function delete(User $user, Party $party)
    {
      return $user->id === $party->user_id;
    }

    /**
     * Determine whether the user can restore the party.
     *
     * @param  \App\User  $user
     * @param  \App\Party  $party
     * @return mixed
     */
    public function restore(User $user, Party $party)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the party.
     *
     * @param  \App\User  $user
     * @param  \App\Party  $party
     * @return mixed
     */
    public function forceDelete(User $user, Party $party)
    {
        //
    }
}
