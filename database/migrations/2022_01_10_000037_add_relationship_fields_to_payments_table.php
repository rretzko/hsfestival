<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id', 'event_fk_5772977')->references('id')->on('events');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5772978')->references('id')->on('users');
            $table->unsignedBigInteger('paymenttype_id')->nullable();
            $table->foreign('paymenttype_id', 'paymenttype_fk_5772979')->references('id')->on('paymenttypes');
        });
    }
}
