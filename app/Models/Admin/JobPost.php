<?php

namespace App\Models\Admin;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPost extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'skill_category_id',
        'skill_sub_category_id',
        'client_user_id',
        'job_unique_code',
        'project_title',
        'project_description',
        'experience_level',
        'budget_type',
        'budget',
        'budget_per_hour',
        'total_hour',
        'total_budget_for_client',
        'public_visibility',
        'freelancer_working_type',
        'preffered_freelancer_location_country',
        'job_location_city',
        'job_starting_date',
        'job_starting_date_timestamp',
        'job_ending_time',
        'job_ending_time_timestamp',
        'job_total_duration',
        'job_total_length',
        'estimate_project_duration_type',
        'estimate_project_duration_time',
        'estimate_project_duration_time_timestamp',
        'promotion_type',
        'job_post_slug',
        'post_expire_date',
        'post_expire_date_timestamp',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'job_posts';

    protected $casts = [
        'job_starting_date' => 'date',
        'post_expire_date' => 'datetime',
    ];

    private static $jobPost;

    public static function createJob($request)
    {
        self::$jobPost = new JobPost();
        self::$jobPost->skill_category_id                               = $request->skill_category_id;
        self::$jobPost->skill_sub_category_id                           = $request->skill_sub_category_id;
        self::$jobPost->client_user_id                                  = auth()->id();
        self::$jobPost->job_unique_code                                 = self::generateUniqueCode();
        self::$jobPost->project_title                                   = $request->project_title;
        self::$jobPost->project_description                             = $request->project_description;
        self::$jobPost->experience_level                                = $request->experience_level;
        self::$jobPost->budget_type                                     = $request->budget_type;
        self::$jobPost->budget                                          = $request->budget;
        self::$jobPost->budget_per_hour                                 = $request->budget_per_hour;
        self::$jobPost->total_hour                                      = $request->total_hour;
        self::$jobPost->total_budget_for_client                         = $request->total_budget_for_client;
        self::$jobPost->public_visibility                               = $request->public_visibility;
        self::$jobPost->freelancer_working_type                         = $request->freelancer_working_type;
        self::$jobPost->preferred_freelancer_location_country           = $request->preferred_freelancer_location_country;
        self::$jobPost->job_location_city                               = $request->job_location_city;
        self::$jobPost->job_starting_date                               = $request->job_starting_date;
        self::$jobPost->job_starting_date_timestamp                     = strtotime($request->job_starting_date);
        self::$jobPost->job_ending_time                                 = $request->job_ending_time;
        self::$jobPost->job_ending_time_timestamp                       = strtotime($request->job_ending_time);
        self::$jobPost->job_total_duration                              = $request->job_total_duration;
        self::$jobPost->job_total_length                                = $request->job_total_length;
        self::$jobPost->estimate_project_duration_type                  = $request->estimate_project_duration_type;
        self::$jobPost->estimate_project_duration_time_timestamp        = $request->estimate_project_duration_time_timestamp;
        self::$jobPost->promotion_type                                  = $request->promotion_type;
        self::$jobPost->post_expire_date                                = $request->post_expire_date;
        self::$jobPost->post_expire_date_timestamp                      = strtotime($request->post_expire_date);
        self::$jobPost->job_post_slug                                   = str_replace(' ', '-', $request->project_title);
        self::$jobPost->status                                          = 0;
        self::$jobPost->save();
        return self::$jobPost;
    }

    public static function generateUniqueCode ()
    {
        $newUniqueCode = rand(10000, 999999);
        $allJobCodes = JobPost::select('job_unique_code')->get();
        if (is_array($allJobCodes))
        {
            if (in_array($newUniqueCode, $allJobCodes))
            {
                self::generateUniqueCode();
            }
        } else {
            return $newUniqueCode;
        }
    }

    public function skillCategory()
    {
        return $this->belongsTo(SkillCategory::class);
    }

    public function skillSubCategory()
    {
        return $this->belongsTo(SkillSubCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'client_user_id');
    }

    public function jobPostFiles()
    {
        return $this->hasMany(JobPostFile::class);
    }

//    public function applyJobs()
//    {
//        return $this->hasMany(ApplyJob::class);
//    }

    public function jobPostQuestions()
    {
        return $this->belongsToMany(JobPostQuestion::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
