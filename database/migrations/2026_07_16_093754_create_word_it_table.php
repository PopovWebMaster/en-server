<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordItTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_it', function (Blueprint $table) {
            $table->id();
            $table->string( 'it', 80 );
            $table->string( 'ru', 80 )->nullable();
            $table->string( 'transcription', 80 )->nullable();
            $table->bigInteger('lesson_it_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word_it');
    }
}
