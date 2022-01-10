<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventorytypesTable extends Migration
{
    public function up()
    {
        Schema::create('inventorytypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descr');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
