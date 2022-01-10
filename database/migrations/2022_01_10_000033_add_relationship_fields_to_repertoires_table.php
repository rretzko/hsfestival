<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRepertoiresTable extends Migration
{
    public function up()
    {
        Schema::table('repertoires', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id', 'event_fk_5772774')->references('id')->on('events');
            $table->unsignedBigInteger('ensemble_id')->nullable();
            $table->foreign('ensemble_id', 'ensemble_fk_5772775')->references('id')->on('ensembles');
        });
    }
}
