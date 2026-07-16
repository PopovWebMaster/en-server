<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordGrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_gr', function (Blueprint $table) {
            $table->id();
            $table->string( 'gr', 80 );
            $table->string( 'ru', 80 )->nullable();
            $table->string( 'transcription', 80 )->nullable();
            $table->bigInteger('lesson_gr_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word_gr');
    }
}
