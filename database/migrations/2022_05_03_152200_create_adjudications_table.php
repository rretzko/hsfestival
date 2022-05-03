<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjudicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjudications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained();
            $table->foreignId('school_id')->constrained();
            $table->foreignId('ensemble_id')->constrained();
            $table->foreignId('adjudicator_id')->constrained();
            $table->integer('part')->default(1);
            $table->string('path');
            $table->timestamps();
            $table->unique(['ensemble_id','adjudicator_id','part']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adjudications');
    }
}
