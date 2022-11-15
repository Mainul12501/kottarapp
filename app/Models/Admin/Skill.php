<?php

namespace App\Models\Admin;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'skill_category_id',
        'skill_sub_category_id',
        'skill_name',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    private static $skill;

    public static function createOrUpdateSkill($request, $id = null)
    {
        Skill::updateOrCreate(['id' => $id], [
            'skill_category_id'             => $request->skill_category_id,
            'skill_sub_category_id'         => $request->skill_sub_category_id,
            'skill_name'                    => $request->skill_name,
            'slug'                          => str_replace(' ', '-', $request->skill_name),
            'status'                        => $request->status == 'on' ? 1 : 0,
        ]);
    }

    public function skillCategory()
    {
        return $this->belongsTo(SkillCategory::class);
    }

    public function skillSubCategory()
    {
        return $this->belongsTo(SkillSubCategory::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function jobPosts()
    {
        return $this->belongsToMany(JobPost::class);
    }
}
