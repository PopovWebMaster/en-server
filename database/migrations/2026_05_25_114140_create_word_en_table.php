<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordEnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_en', function (Blueprint $table) {
            $table->id();
            $table->string( 'en', 80 );
            $table->string( 'ru', 80 )->nullable();
            $table->string( 'transcription', 80 )->nullable();

            $table->bigInteger('lesson_en_id')->nullable();




            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word_en');
    }
}
