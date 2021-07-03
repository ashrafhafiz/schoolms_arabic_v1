<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelTableSeeder extends Seeder
{

	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('levels')->truncate();

		$levels = [
			[
				'en' => 'Preschool (Pre-K)',
				'ar' => 'مرحلة ما قبل الحضانة'
			],
			[
				'en' => 'Kindergarten (KG)',
				'ar' => 'مرحلة الحضانة'
			],
			[
				'en' => 'Primary School',
				'ar' => 'المرحلة الإبتدائية'
			],
			[
				'en' => 'Prep School',
				'ar' => 'المرحلة الإعدادية'
			],
			[
				'en' => 'High School',
				'ar' => 'المرحلة الثانوية'
			]
		];

		foreach ($levels as $level) {
			Level::create(['name' => $level]);
		}

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
