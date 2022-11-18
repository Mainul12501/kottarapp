<?php

namespace App\Models\Admin;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplyFile extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'apply_job_id',
        'file_url',
        'file_type',
        'file_size',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'job_apply_files';

    public function applyJob()
    {
        return $this->belongsTo(ApplyJob::class);
    }
}
