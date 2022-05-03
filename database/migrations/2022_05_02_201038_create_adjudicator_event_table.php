<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjudicatorEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjudicator_event', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adjudicator_id')->constrained();
            $table->foreignId('event_id')->constrained();
            $table->timestamps();
            $table->unique('adjudicator_id','event_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adjudicator_event');
    }
}
