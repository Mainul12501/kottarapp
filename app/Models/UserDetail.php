<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;
    use Searchable;

    public static $userDetails;

    protected $fillable = [
        'first_name',
        'last_name',
        'surname',
        'country',
        'emirate_state_name',
        'phone',
        'profile_image',
        'gender',
        'educational_status',
        'university_name',
        'freelancer_job_title',
        'freelancer_language',
        'bank_account_no',
        'bank_name',
        'emirates_id_no',
        'freelancer_description',
        'working_type',
        'company_name',
        'company_establish_year',
        'company_status',
        'business_name',
        'company_size',
        'company_speciality',
        'company_service',
        'trade_license_no',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'user_details';

    public static function saveUserDetailsFromJetStream ($input)
    {
        self::$userDetails = new UserDetail();
        self::$userDetails->first_name  = $input['first_name'];
//        self::$userDetails->last_name  = $input['last_name'];
//        self::$userDetails->sure_name  = $input['sure_name'];
//        self::$userDetails->country  = $input['country'];
//        self::$userDetails->company_name  = $input['company_name'];
//        self::$userDetails->company_establish_year  = $input['company_establish_year'];
//        self::$userDetails->business_name  = $input['business_name'];
        self::$userDetails->save();
        return self::$userDetails->id;
    }

    public static function createOrUpdateUserDetails($request, $id = null)
    {
        return UserDetail::updateOrCreate(['id' => $id], [
            'first_name'                    => $request->first_name,
            'last_name'                     => $request->last_name,
            'sure_name'                     => $request->sure_name,
            'country'                       => $request->country,
            'emirate_state_name'            => $request->emirate_state_name,
            'phone'                         => $request->phone,
            'profile_image'                 => imageUpload($request->file('profile_image'),'user-profile-pictures/'),
            'gender'                        => $request->gender,
            'educational_status'            => $request->educational_status,
            'university_name'               => $request->university_name,
            'freelancer_job_title'          => $request->Freelancer_job_title,
            'freelancer_language'           => $request->Freelancer_language,
            'freelancer_description'        => $request->freelancer_description,
            'working_type'                  => $request->Working_type,
            'company_name'                  => $request->company_name,
            'company_establish_year'        => $request->company_establish_year,
            'company_status'                => $request->company_status,
            'business_name'                 => $request->business_name,
            'company_size'                  => $request->company_size,
            'company_speciality'            => $request->company_speciality,
            'company_service'               => $request->company_service,
            'trade_license_no'              => $request->trade_license_no,
        ]);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
