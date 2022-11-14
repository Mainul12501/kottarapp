<?php

namespace App\Models\Admin;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TradeLicenseFile extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'file_url', 'file_type', 'file_size'];

    protected $searchableFields = ['*'];

    protected $table = 'trade_license_files';

    protected static $tradeLicenseFile;

    public static function saveAndUpdateTradeLicenseFiles ($fileArray, $user)
    {
        foreach ($fileArray as $item)
        {
            self::$tradeLicenseFile = new TradeLicenseFile();
            self::$tradeLicenseFile->user_id    = $user->id;
            if (explode('/', $item->getClientMimeType())[0] == 'image')
            {
                self::$tradeLicenseFile->file_url    = imageUpload($item, 'client-trade-license-files/', 'client-trade-license-file-');
            } else {
                self::$tradeLicenseFile->file_url = fileUploadHelper($item, 'client-trade-license-files/', 'client-trade-license-files-');
            }
            self::$tradeLicenseFile->file_size   = $item->getSize();
            self::$tradeLicenseFile->file_type   = $item->getClientMimeType();
            self::$tradeLicenseFile->save();
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
