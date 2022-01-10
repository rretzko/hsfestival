<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepertoiresTable extends Migration
{
    public function up()
    {
        Schema::create('repertoires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->time('duration');
            $table->longText('movements')->nullable();
            $table->string('composer')->nullable();
            $table->string('arranger')->nullable();
            $table->string('lyricist')->nullable();
            $table->string('choreographer')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
