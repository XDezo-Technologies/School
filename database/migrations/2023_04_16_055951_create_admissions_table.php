<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id('admissionID');
            $table->bigInteger('studentID')->unsigned()->index()->nullable();
            $table->foreign('studentID')->references('id')->on('student')->onDelete('cascade');
            $table->bigInteger('courseID')->unsigned()->index()->nullable();
            $table->foreign('courseID')->references('id')->on('course')->onDelete('cascade');
            $table->string('img');
            $table->string('name');
            $table->string('courseName');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
};
