<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventLocationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('event_location', function (Blueprint $table) {
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id', 'location_id_fk_5772420')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'event_id_fk_5772420')->references('id')->on('events')->onDelete('cascade');
        });
    }
}
