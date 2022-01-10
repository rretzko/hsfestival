<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descr');
            $table->string('label_default');
            $table->string('label_alternate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
