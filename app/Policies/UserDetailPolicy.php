<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserDetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the userDetail can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the userDetail can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserDetail  $model
     * @return mixed
     */
    public function view(User $user, UserDetail $model)
    {
        return true;
    }

    /**
     * Determine whether the userDetail can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the userDetail can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserDetail  $model
     * @return mixed
     */
    public function update(User $user, UserDetail $model)
    {
        return true;
    }

    /**
     * Determine whether the userDetail can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserDetail  $model
     * @return mixed
     */
    public function delete(User $user, UserDetail $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserDetail  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the userDetail can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserDetail  $model
     * @return mixed
     */
    public function restore(User $user, UserDetail $model)
    {
        return false;
    }

    /**
     * Determine whether the userDetail can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserDetail  $model
     * @return mixed
     */
    public function forceDelete(User $user, UserDetail $model)
    {
        return false;
    }
}
