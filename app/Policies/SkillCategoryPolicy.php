<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SkillCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the skillCategory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the skillCategory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillCategory  $model
     * @return mixed
     */
    public function view(User $user, SkillCategory $model)
    {
        return true;
    }

    /**
     * Determine whether the skillCategory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the skillCategory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillCategory  $model
     * @return mixed
     */
    public function update(User $user, SkillCategory $model)
    {
        return true;
    }

    /**
     * Determine whether the skillCategory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillCategory  $model
     * @return mixed
     */
    public function delete(User $user, SkillCategory $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillCategory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the skillCategory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillCategory  $model
     * @return mixed
     */
    public function restore(User $user, SkillCategory $model)
    {
        return false;
    }

    /**
     * Determine whether the skillCategory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillCategory  $model
     * @return mixed
     */
    public function forceDelete(User $user, SkillCategory $model)
    {
        return false;
    }
}
