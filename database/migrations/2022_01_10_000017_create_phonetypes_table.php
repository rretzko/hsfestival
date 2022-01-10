<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonetypesTable extends Migration
{
    public function up()
    {
        Schema::create('phonetypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descr');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
