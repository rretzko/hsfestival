<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationdatesTable extends Migration
{
    public function up()
    {
        Schema::create('locationdates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('start_datetime');
            $table->datetime('end_datetime');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
