<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLevelsTable extends Migration
{

	public function up()
	{
		Schema::create('levels', function (Blueprint $table) {
			$table->id();
			$table->string('name')->unique();
			$table->text('notes')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('levels');
	}
}
