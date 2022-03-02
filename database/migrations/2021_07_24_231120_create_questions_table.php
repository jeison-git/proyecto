<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quiz_id');

            $table->text('question');
            $table->text('image')->nullable();
            $table->text('answer_1');
            $table->text('answer_2');
            $table->text('answer_3');
            $table->text('answer_4');
            $table->enum('correct_answer', ['answer_1', 'answer_2', 'answer_3', 'answer_4']);

            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');

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
        Schema::dropIfExists('questions');
    }
}
