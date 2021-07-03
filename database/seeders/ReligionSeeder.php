<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('religions')->truncate();

        $religions = [
            [
                'en' => 'muslim',
                'ar' => 'مسلم'
            ],
            [
                'en' => 'christian',
                'ar' => 'مسيحي'
            ],
            [
                'en' => 'other',
                'ar' => 'غير ذلك'
            ],
        ];

        foreach ($religions as $religion) {
            Religion::create(['name' => $religion]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
