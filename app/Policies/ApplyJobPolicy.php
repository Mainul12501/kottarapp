<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\ApplyJob;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplyJobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the applyJob can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the applyJob can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ApplyJob  $model
     * @return mixed
     */
    public function view(User $user, ApplyJob $model)
    {
        return true;
    }

    /**
     * Determine whether the applyJob can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the applyJob can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ApplyJob  $model
     * @return mixed
     */
    public function update(User $user, ApplyJob $model)
    {
        return true;
    }

    /**
     * Determine whether the applyJob can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ApplyJob  $model
     * @return mixed
     */
    public function delete(User $user, ApplyJob $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ApplyJob  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the applyJob can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ApplyJob  $model
     * @return mixed
     */
    public function restore(User $user, ApplyJob $model)
    {
        return false;
    }

    /**
     * Determine whether the applyJob can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ApplyJob  $model
     * @return mixed
     */
    public function forceDelete(User $user, ApplyJob $model)
    {
        return false;
    }
}
