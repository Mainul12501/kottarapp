<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobApplyFile;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobApplyFilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jobApplyFile can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobApplyFile can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobApplyFile  $model
     * @return mixed
     */
    public function view(User $user, JobApplyFile $model)
    {
        return true;
    }

    /**
     * Determine whether the jobApplyFile can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobApplyFile can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobApplyFile  $model
     * @return mixed
     */
    public function update(User $user, JobApplyFile $model)
    {
        return true;
    }

    /**
     * Determine whether the jobApplyFile can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobApplyFile  $model
     * @return mixed
     */
    public function delete(User $user, JobApplyFile $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobApplyFile  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobApplyFile can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobApplyFile  $model
     * @return mixed
     */
    public function restore(User $user, JobApplyFile $model)
    {
        return false;
    }

    /**
     * Determine whether the jobApplyFile can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobApplyFile  $model
     * @return mixed
     */
    public function forceDelete(User $user, JobApplyFile $model)
    {
        return false;
    }
}
