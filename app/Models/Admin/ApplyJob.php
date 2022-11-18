<?php

namespace App\Models\Admin;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplyJob extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'job_post_id',
        'freelancer_user_id',
        'proposal_text',
        'budget_proposal',
        'first_time_proposal_submit',
        'project_starting_date',
        'project_ending_date',
        'is_selected_for_project',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'apply_jobs';

    protected $casts = [
        'project_starting_date' => 'datetime',
        'project_ending_date' => 'datetime',
    ];

    private static $applyJob;

    public static function applyJob ($request, $gig, $id = null)
    {
        return ApplyJob::updateOrCreate(['id' => $id], [
            'job_post_id'       => $gig->id,
            'freelancer_user_id'    => auth()->id(),
            'proposal_text' => $request->proposal_text,
            'budget_proposal'   => $request->budget_proposal,
            'first_time_proposal_submit'    => isset($id) ? 0 : 1,
        ]);
    }

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function freelancerDetails()
    {
        return $this->belongsTo(User::class, 'freelancer_user_id');
    }

    public function jobApplyFiles()
    {
        return $this->hasMany(JobApplyFile::class);
    }
}
