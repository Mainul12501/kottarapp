<?php

namespace App\Models\Admin;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSetting extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'site_title',
        'site_name',
        'site_fav_icon',
        'site_logo',
        'site_banner',
        'site_meta',
        'author_name',
        'job_post_validate_time',
        'seo_header',
        'seo_footer',
        'job_service_charge',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'site_settings';

    private static $siteSetting;

    public static function storeOrUpdate ($request, $id=null)
    {
        SiteSetting::updateOrCreate(['id' => $id], [
            'site_title' => $request->site_title,
            'site_name' => $request->site_name,
            'site_fav_icon' => imageUpload($request->file('site_fav_icon'),'site-settings/', 'fav-icon', null, null, isset($id) ? SiteSetting::find($id)->site_fav_icon : null),
            'site_logo' => imageUpload($request->file('site_logo'),'site-settings/', 'fav-icon', null, null, isset($id) ? SiteSetting::find($id)->site_logo : null),
            'site_banner' => imageUpload($request->file('site_banner'),'site-settings/', 'fav-icon', null, null, isset($id) ? SiteSetting::find($id)->site_banner : null),
            'site_meta' => $request->site_meta,
            'author_name' => $request->author_name,
            'job_post_validate_time' => $request->job_post_validate_time,
            'seo_header' => $request->seo_header,
            'seo_footer' => $request->seo_footer,
            'job_service_charge' => $request->job_service_charge,
        ]);
    }
}
