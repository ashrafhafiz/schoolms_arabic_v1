<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration
{

	public function up()
	{
		Schema::create('grades', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->bigInteger('level_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('grades');
	}
}
