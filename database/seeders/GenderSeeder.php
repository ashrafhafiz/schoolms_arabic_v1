<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('genders')->truncate();

        $genders = [
            ['en' => 'Male', 'ar' => 'ذكر'],
            ['en' => 'Female', 'ar' => 'أنثى'],
        ];

        foreach ($genders as $gender) {
            Gender::create(['name' => $gender]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
