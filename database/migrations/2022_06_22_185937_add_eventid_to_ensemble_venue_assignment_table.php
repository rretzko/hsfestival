<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventidToEnsembleVenueAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ensemble_venue_assignments', function (Blueprint $table) {
            $table->foreignId('event_id')->default(1)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ensemble_venue_assignment', function (Blueprint $table) {
            $table->dropColumn('event_id');
        });
    }
}
