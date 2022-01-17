<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnsemblesTable extends Migration
{
    public function up()
    {
        Schema::create('ensembles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('conductor');
            $table->boolean('auditioned')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['name','school_id']);
        });
    }
}
