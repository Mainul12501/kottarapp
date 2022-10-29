<?php

namespace App\Models\Admin;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPostQuestion extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['question', 'slug', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'job_post_questions';

    private static $jobQuestion;

    public static function createOrUpdateJobQuestion ($request, $id = null)
    {
        JobPostQuestion::updateOrCreate(['id' => $id], [
            'question'  => $request->question,
            'slug'  => str_replace(' ', '-', $request->question),
            'status'    => $request->status == 'on' ? 1 : 0
        ]);
    }

//    public function jobPosts()
//    {
//        return $this->belongsToMany(JobPost::class);
//    }
}
