<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Work;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Work $work)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $last_work = $user->works()->latest()->first();

        return is_null($last_work) || $last_work->created_at->diff(date("Y-m-d H:i:s"))->d >= 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Work $work)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Work $work)
    {
        return $user->id == $work->user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Work $work)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Work $work)
    {
        //
    }
}
