<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordFrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_fr', function (Blueprint $table) {
            $table->id();
            $table->string( 'fr', 80 );
            $table->string( 'ru', 80 )->nullable();
            $table->string( 'transcription', 80 )->nullable();
            $table->bigInteger('lesson_fr_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word_fr');
    }
}
