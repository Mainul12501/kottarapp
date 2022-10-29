<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Auth\Access\HandlesAuthorization;

class SiteSettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the siteSetting can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the siteSetting can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SiteSetting  $model
     * @return mixed
     */
    public function view(User $user, SiteSetting $model)
    {
        return true;
    }

    /**
     * Determine whether the siteSetting can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the siteSetting can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SiteSetting  $model
     * @return mixed
     */
    public function update(User $user, SiteSetting $model)
    {
        return true;
    }

    /**
     * Determine whether the siteSetting can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SiteSetting  $model
     * @return mixed
     */
    public function delete(User $user, SiteSetting $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SiteSetting  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the siteSetting can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SiteSetting  $model
     * @return mixed
     */
    public function restore(User $user, SiteSetting $model)
    {
        return false;
    }

    /**
     * Determine whether the siteSetting can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SiteSetting  $model
     * @return mixed
     */
    public function forceDelete(User $user, SiteSetting $model)
    {
        return false;
    }
}
