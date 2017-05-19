<?php

namespace App\Policies;

use App\User;
use App\Models\Nade;
use Illuminate\Auth\Access\HandlesAuthorization;

class NadePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the nade.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Nade  $nade
     * @return mixed
     */
    public function view(User $user, Nade $nade)
    {
        //
    }

    /**
     * Determine whether the user can create nades.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the nade.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Nade  $nade
     * @return mixed
     */
    public function update(User $user, Nade $nade)
    {
        //
    }

    /**
     * Determine whether the user can delete the nade.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Nade  $nade
     * @return mixed
     */
    public function delete(User $user, Nade $nade)
    {
        //
    }

    public function approve(User $user, Nade $nade)
    {
        return $user->is_mod || $user->is_admin;
    }
}
