<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\JobPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jobPost can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobPost can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPost  $model
     * @return mixed
     */
    public function view(User $user, JobPost $model)
    {
        return true;
    }

    /**
     * Determine whether the jobPost can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobPost can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPost  $model
     * @return mixed
     */
    public function update(User $user, JobPost $model)
    {
        return true;
    }

    /**
     * Determine whether the jobPost can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPost  $model
     * @return mixed
     */
    public function delete(User $user, JobPost $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPost  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobPost can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPost  $model
     * @return mixed
     */
    public function restore(User $user, JobPost $model)
    {
        return false;
    }

    /**
     * Determine whether the jobPost can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPost  $model
     * @return mixed
     */
    public function forceDelete(User $user, JobPost $model)
    {
        return false;
    }
}
