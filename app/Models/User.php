<?php

namespace App\Models;

use App\Models\Admin\JobPost;
use App\Models\Admin\TradeLicenseFile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    private static $user, $users, $userDetails;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_details_id',
        'user_role_type',
        'account_type',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'profile_photo_url'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function updateOrCreateUser($request, $userDetailsId, $id = null)
    {
        self::$user = new User();
        self::$user->user_details_id   = $userDetailsId;
        self::$user->name   = $request->name;
        self::$user->email   = $request->email;
        if (!empty($request->password))
        {
            self::$user->password   = Hash::make($request->password);
        }
        self::$user->user_role_type = $request->user_role_type;
        self::$user->account_status = empty(User::first()) ? 1 : 0;
        self::$user->save();
        return self::$user;
    }

    public function userDetails ()
    {
        return $this->belongsTo(UserDetail::class, 'user_details_id', 'id');
    }

    public function tradeLicenseFiles()
    {
        return $this->hasMany(TradeLicenseFile::class);
    }

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'client_user_id');
    }
//
//    public function applyJobs()
//    {
//        return $this->hasMany(ApplyJob::class, 'freelancer_user_id');
//    }
//
//    public function ratedBy()
//    {
//        return $this->hasMany(Review::class, 'rated_by');
//    }
//
//    public function ratedTo()
//    {
//        return $this->hasMany(Review::class, 'rated_to');
//    }
}
