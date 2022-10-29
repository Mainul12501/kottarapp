<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TradeLicenseFile;
use Illuminate\Auth\Access\HandlesAuthorization;

class TradeLicenseFilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tradeLicenseFile can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the tradeLicenseFile can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TradeLicenseFile  $model
     * @return mixed
     */
    public function view(User $user, TradeLicenseFile $model)
    {
        return true;
    }

    /**
     * Determine whether the tradeLicenseFile can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the tradeLicenseFile can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TradeLicenseFile  $model
     * @return mixed
     */
    public function update(User $user, TradeLicenseFile $model)
    {
        return true;
    }

    /**
     * Determine whether the tradeLicenseFile can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TradeLicenseFile  $model
     * @return mixed
     */
    public function delete(User $user, TradeLicenseFile $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TradeLicenseFile  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the tradeLicenseFile can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TradeLicenseFile  $model
     * @return mixed
     */
    public function restore(User $user, TradeLicenseFile $model)
    {
        return false;
    }

    /**
     * Determine whether the tradeLicenseFile can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TradeLicenseFile  $model
     * @return mixed
     */
    public function forceDelete(User $user, TradeLicenseFile $model)
    {
        return false;
    }
}
