<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioEsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_es', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('word_es_id');
            $table->bigInteger('lesson_es_id')->nullable();
            $table->string( 'file_name', 90 );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio_es');
    }
}
