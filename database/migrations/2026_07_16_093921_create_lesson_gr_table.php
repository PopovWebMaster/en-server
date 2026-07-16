<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonGrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_gr', function (Blueprint $table) {
            $table->id();
            $table->string( 'title', 255 )->nullable();
            $table->string( 'description', 255 )->nullable();
            $table->string( 'level_name', 50 )->nullable();
            $table->boolean('is_active')->default( false );
            $table->integer('order')->nullable();
            $table->boolean('is_paid')->default( false );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_gr');
    }
}
