<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnsembleVenueAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ensemble_venue_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ensemble_id')->constrained();
            $table->foreignId('venue_id')->constrained();
            $table->time('timeslot');
            $table->timestamps();
            $table->unique('ensemble_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ensemble_venue_assignments');
    }
}
