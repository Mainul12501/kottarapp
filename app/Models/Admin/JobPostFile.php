<?php

namespace App\Models\Admin;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPostFile extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['job_post_id', 'file_url', 'file_type', 'file_size'];

    protected $searchableFields = ['*'];

    protected $table = 'job_post_files';

    private static $files, $file, $jobPostFile;

    public static function saveJobPostFile($filesArray, $jobPost = null)
    {
        foreach ($filesArray as $item)
        {
            self::$jobPostFile = new JobPostFile();
            self::$jobPostFile->job_post_id = $jobPost->id;
            if (explode('/', $item->getClientMimeType())[0] == 'image')
            {
                self::$jobPostFile->file_url    = imageUpload($item, 'job-post-files/', 'job-post-'.$jobPost->job_unique_code.'-');
            } else {

                self::$jobPostFile->file_url = fileUploadHelper($item, 'job-post-files/', 'job-post-'.$jobPost->job_unique_code.'-');
            }
            self::$jobPostFile->file_size   = $item->getSize();
            self::$jobPostFile->file_type   = $item->getClientMimeType();
            self::$jobPostFile->save();
        }
    }

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }
}
