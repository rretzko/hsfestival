<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPhonesTable extends Migration
{
    public function up()
    {
        Schema::table('phones', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5772824')->references('id')->on('users');
            $table->unsignedBigInteger('phonetype_id')->nullable();
            $table->foreign('phonetype_id', 'phonetype_fk_5772825')->references('id')->on('phonetypes');
        });
    }
}
