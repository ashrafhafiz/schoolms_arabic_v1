<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sections')->truncate();

        $sections = [
            [
                'en' => 'A',
                'ar' => 'أ'
            ],
            [
                'en' => 'B',
                'ar' => 'ب'
            ],
            [
                'en' => 'C',
                'ar' => 'ج'
            ],
            [
                'en' => 'D',
                'ar' => 'د'
            ],
        ];

        // Retrive Grades ID
        $grades = DB::table('grades')->get()->pluck('id');

        foreach ($grades as $grade) {
            foreach ($sections as $section) {
                Section::create([
                    'name' => $section,
                    'grade_id' => $grade,
                    'status' => TRUE,
                ]);
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
