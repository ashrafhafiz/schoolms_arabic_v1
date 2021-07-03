<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration
{

	public function up()
	{
		Schema::table('grades', function (Blueprint $table) {
			$table->foreign('level_id')->references('id')->on('levels')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('grades', function (Blueprint $table) {
			$table->dropForeign('grades_level_id_foreign');
		});
	}
}
