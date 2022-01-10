<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEnsemblesTable extends Migration
{
    public function up()
    {
        Schema::table('ensembles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5772763')->references('id')->on('users');
            $table->unsignedBigInteger('school_id')->nullable();
            $table->foreign('school_id', 'school_fk_5772767')->references('id')->on('schools');
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id', 'event_fk_5772768')->references('id')->on('events');
            $table->unsignedBigInteger('ensembletype_id')->nullable();
            $table->foreign('ensembletype_id', 'ensembletype_fk_5772771')->references('id')->on('ensembletypes');
        });
    }
}
