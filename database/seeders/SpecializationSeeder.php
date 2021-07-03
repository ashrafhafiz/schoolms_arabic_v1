<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('specializations')->truncate();

        $specializations = [
            ['en' => 'Headmaster', 'ar' => 'مدير المدرسة'],
            ['en' => 'Dean', 'ar' => 'عميد المدرسة'],
            ['en' => 'Arabic Teacher', 'ar' => 'مدرس لغة عربية'],
            ['en' => 'Senior Arabic Teacher', 'ar' => 'مدرس أول لغة عربية'],
            ['en' => 'English Teacher', 'ar' => 'مدرس لغة إنجليزية'],
            ['en' => 'Senior English Teacher', 'ar' => 'مدرس أول لغة إنجليزية'],
            ['en' => 'Science Teacher', 'ar' => 'مدرس علوم'],
            ['en' => 'Senior Science Teacher', 'ar' => 'مدرس أول علوم'],
        ];

        foreach ($specializations as $specialization) {
            Specialization::create(['name' => $specialization]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
