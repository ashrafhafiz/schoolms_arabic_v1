<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('grades')->truncate();

        $grades = [
            [
                'name' => [
                    'en' => 'Preschool Class',
                    'ar' => 'فصل ما قبل المدرسة'
                ],
                'level_id' => 1,
            ],
            [
                'name' => [
                    'en' => 'KG 1',
                    'ar' => 'حضانة 1'
                ],
                'level_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'KG 2',
                    'ar' => 'حضانة 2'
                ],
                'level_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Grade 1',
                    'ar' => 'الصف الأول'
                ],
                'level_id' => 3,
            ],
            [
                'name' => [
                    'en' => 'Grade 2',
                    'ar' => 'الصف الثاني'
                ],
                'level_id' => 3,
            ],
            [
                'name' => [
                    'en' => 'Grade 3',
                    'ar' => 'الصف الثالث'
                ],
                'level_id' => 3,
            ],
            [
                'name' => [
                    'en' => 'Grade 4',
                    'ar' => 'الصف الرابع'
                ],
                'level_id' => 3,
            ],
            [
                'name' => [
                    'en' => 'Grade 5',
                    'ar' => 'الصف الخامس'
                ],
                'level_id' => 3,
            ],
            [
                'name' => [
                    'en' => 'Grade 6',
                    'ar' => 'الصف السادس'
                ],
                'level_id' => 3,
            ],
            [
                'name' => [
                    'en' => 'Grade 7',
                    'ar' => 'الصف السابع'
                ],
                'level_id' => 4,
            ],
            [
                'name' => [
                    'en' => 'Grade 8',
                    'ar' => 'الصف الثامن'
                ],
                'level_id' => 4,
            ],
            [
                'name' => [
                    'en' => ' Grade 9',
                    'ar' => 'الصف التاسع'
                ],
                'level_id' => 4,
            ],
            [
                'name' => [
                    'en' => 'Grade 10',
                    'ar' => 'الصف العاشر'
                ],
                'level_id' => 5,
            ],
            [
                'name' => [
                    'en' => 'Grade 11',
                    'ar' => 'الصف الحادى عشر'
                ],
                'level_id' => 5,
            ],
            [
                'name' => [
                    'en' => 'Grade 12',
                    'ar' => 'الصف الثاني عشر'
                ],
                'level_id' => 5,
            ],
        ];

        foreach ($grades as $grade) {
            Grade::create($grade);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
