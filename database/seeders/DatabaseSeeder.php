<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

	public function run()
	{
		Model::unguard();

		// $this->call([LevelTableSeeder::class]);
		// $this->command->info('Level table seeded!');

		// $this->call([BloodTypeSeeder::class]);
		// $this->command->info('Blood Types table seeded!');

		// $this->call([NationalitySeeder::class]);
		// $this->command->info('Nationalities table seeded!');

		$this->call([ReligionSeeder::class]);
		$this->command->info('Religions table seeded!');
	}
}
