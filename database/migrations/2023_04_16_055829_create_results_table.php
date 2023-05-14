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
        Schema::create('results', function (Blueprint $table) {
            $table->id('resultID');
            $table->bigInteger('studentID')->unsigned()->index()->nullable();
            $table->foreign('studentID')->references('id')->on('student')->onDelete('cascade');
            $table->string('name');
            $table->string('subject');
            $table->string('full_marks');
            $table->string('pass_marks');
            $table->string('acquired_marks');
            $table->string('remarks');
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
        Schema::dropIfExists('results');
    }
};
