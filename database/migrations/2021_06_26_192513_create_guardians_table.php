<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            //Father (guardian 1) information
            $table->string('f_name');
            $table->string('f_nid');
            $table->string('f_pid')->nullable();
            $table->string('f_phone');
            $table->string('f_job')->nullable();
            $table->unsignedBigInteger('f_nationalityId');
            $table->foreign('f_nationalityId')->references('id')->on('nationalities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('f_bloodtypeId');
            $table->foreign('f_bloodtypeId')->references('id')->on('blood_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('f_religionId');
            $table->foreign('f_religionId')->references('id')->on('religions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('f_address');

            //Mother (guardian 2) information
            $table->string('m_name');
            $table->string('m_nid');
            $table->string('m_pid')->nullable();
            $table->string('m_phone');
            $table->string('m_job')->nullable();
            $table->unsignedBigInteger('m_nationalityId');
            $table->foreign('m_nationalityId')->references('id')->on('nationalities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('m_bloodtypeId');
            $table->foreign('m_bloodtypeId')->references('id')->on('blood_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('m_religionId');
            $table->foreign('m_religionId')->references('id')->on('religions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('m_address');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardians');
    }
}
