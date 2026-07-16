<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioTrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_tr', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('word_tr_id');
            $table->bigInteger('lesson_tr_id')->nullable();
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
        Schema::dropIfExists('audio_tr');
    }
}
