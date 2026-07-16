<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordCnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_cn', function (Blueprint $table) {
            $table->id();
            $table->string( 'cn', 80 );
            $table->string( 'ru', 80 )->nullable();
            $table->string( 'transcription', 80 )->nullable();
            $table->bigInteger('lesson_cn_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word_cn');
    }
}
