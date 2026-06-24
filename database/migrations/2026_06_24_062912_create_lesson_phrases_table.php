<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonPhrasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_phrases', function (Blueprint $table) {
            $table->id();

            $table->string( 'foreign', 255 )->nullable();
            $table->string( 'ru', 255 )->nullable();
            $table->string( 'key_name', 2 );
            $table->bigInteger('lesson_id')->nullable();

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
        Schema::dropIfExists('lesson_phrases');
    }
}
