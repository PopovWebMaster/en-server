<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioEn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_en', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('word_en_id');
            $table->bigInteger('lesson_en_id')->nullable();

            $table->string( 'file_name', 90 );


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
        Schema::dropIfExists('audio_en');
    }
}
