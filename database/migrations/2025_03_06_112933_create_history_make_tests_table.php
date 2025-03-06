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
        Schema::create('history_make_tests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('exercise_id');
            $table->integer('question_id')->nullable();
            $table->integer('answer_id')->nullable();
            $table->integer('score')->nullable();
            $table->integer('total_question')->nullable();

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
        Schema::dropIfExists('history_make_tests');
    }
};
