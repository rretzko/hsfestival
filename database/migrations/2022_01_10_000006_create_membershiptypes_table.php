<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershiptypesTable extends Migration
{
    public function up()
    {
        Schema::create('membershiptypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descr');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
