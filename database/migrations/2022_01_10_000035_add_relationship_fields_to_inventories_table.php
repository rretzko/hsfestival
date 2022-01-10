<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInventoriesTable extends Migration
{
    public function up()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->unsignedBigInteger('inventorytype_id')->nullable();
            $table->foreign('inventorytype_id', 'inventorytype_fk_5772930')->references('id')->on('inventorytypes');
        });
    }
}
