<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCartsTable extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id', 'event_fk_5772938')->references('id')->on('events');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5772939')->references('id')->on('users');
            $table->unsignedBigInteger('inventory_id')->nullable();
            $table->foreign('inventory_id', 'inventory_fk_5772940')->references('id')->on('inventories');
        });
    }
}
