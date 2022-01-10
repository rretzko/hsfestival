<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOptionsTable extends Migration
{
    public function up()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->unsignedBigInteger('optiontype_id')->nullable();
            $table->foreign('optiontype_id', 'optiontype_fk_5772627')->references('id')->on('optiontypes');
        });
    }
}
