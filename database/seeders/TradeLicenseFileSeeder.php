<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\TradeLicenseFile;

class TradeLicenseFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TradeLicenseFile::factory()
            ->count(5)
            ->create();
    }
}
