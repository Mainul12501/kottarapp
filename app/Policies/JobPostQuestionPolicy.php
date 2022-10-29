<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobPostQuestion;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPostQuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jobPostQuestion can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobPostQuestion can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostQuestion  $model
     * @return mixed
     */
    public function view(User $user, JobPostQuestion $model)
    {
        return true;
    }

    /**
     * Determine whether the jobPostQuestion can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobPostQuestion can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostQuestion  $model
     * @return mixed
     */
    public function update(User $user, JobPostQuestion $model)
    {
        return true;
    }

    /**
     * Determine whether the jobPostQuestion can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostQuestion  $model
     * @return mixed
     */
    public function delete(User $user, JobPostQuestion $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostQuestion  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the jobPostQuestion can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostQuestion  $model
     * @return mixed
     */
    public function restore(User $user, JobPostQuestion $model)
    {
        return false;
    }

    /**
     * Determine whether the jobPostQuestion can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobPostQuestion  $model
     * @return mixed
     */
    public function forceDelete(User $user, JobPostQuestion $model)
    {
        return false;
    }
}
