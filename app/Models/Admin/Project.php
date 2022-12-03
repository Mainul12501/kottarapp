<?php

namespace App\Models\Admin;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'client_id',
        'title',
        'total_gigs',
        'total_budget',
        'slug',
        'status',
    ];

    private static $project, $projects;

    protected $searchableFields = ['*'];

    public static function createOrUpdateProject($request, $id = null)
    {
        return Project::updateOrCreate(['id' => $id],[
            'client_id'     => auth()->id(),
            'title'         => $request->title,
            'total_gigs'    => $request->total_gigs,
            'total_budget'  => $request->total_budget,
            'slug'          => str_replace(' ', '-', $request->title),
            'status'        => $request->status,
        ]);
    }

    public function jobPosts()
    {
        return $this->belongsToMany(JobPost::class);
    }

    public function clientUser()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
