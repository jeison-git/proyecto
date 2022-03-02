<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Publication;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('subtitle');
            $table->string('author');
            $table->string('gender');
            $table->string('slug');
            $table->mediumText('description');
            $table->enum('status', [Publication::SOLICITAR, Publication::REVISION, Publication::APROVADO])->default(Publication::SOLICITAR);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_publication_id')->nullable();
            $table->unsignedBigInteger('date_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_publication_id')->references('id')->on('category__publications')->onDelete('set null');
            $table->foreign('date_id')->references('id')->on('dates')->onDelete('set null');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('set null');

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
        Schema::dropIfExists('publications');
    }
}
