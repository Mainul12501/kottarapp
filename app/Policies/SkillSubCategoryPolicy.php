<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\SkillSubCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillSubCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the skillSubCategory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the skillSubCategory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillSubCategory  $model
     * @return mixed
     */
    public function view(User $user, SkillSubCategory $model)
    {
        return true;
    }

    /**
     * Determine whether the skillSubCategory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the skillSubCategory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillSubCategory  $model
     * @return mixed
     */
    public function update(User $user, SkillSubCategory $model)
    {
        return true;
    }

    /**
     * Determine whether the skillSubCategory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillSubCategory  $model
     * @return mixed
     */
    public function delete(User $user, SkillSubCategory $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillSubCategory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the skillSubCategory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillSubCategory  $model
     * @return mixed
     */
    public function restore(User $user, SkillSubCategory $model)
    {
        return false;
    }

    /**
     * Determine whether the skillSubCategory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SkillSubCategory  $model
     * @return mixed
     */
    public function forceDelete(User $user, SkillSubCategory $model)
    {
        return false;
    }
}
