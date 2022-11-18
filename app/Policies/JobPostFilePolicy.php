<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\JobPostFile;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPostFilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jobPostFile can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobPostFile can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostFile  $model
     * @return mixed
     */
    public function view(User $user, JobPostFile $model)
    {
        return true;
    }

    /**
     * Determine whether the jobPostFile can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobPostFile can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostFile  $model
     * @return mixed
     */
    public function update(User $user, JobPostFile $model)
    {
        return true;
    }

    /**
     * Determine whether the jobPostFile can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostFile  $model
     * @return mixed
     */
    public function delete(User $user, JobPostFile $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostFile  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobPostFile can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostFile  $model
     * @return mixed
     */
    public function restore(User $user, JobPostFile $model)
    {
        return false;
    }

    /**
     * Determine whether the jobPostFile can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostFile  $model
     * @return mixed
     */
    public function forceDelete(User $user, JobPostFile $model)
    {
        return false;
    }
}
