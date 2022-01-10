<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMembershipsTable extends Migration
{
    public function up()
    {
        Schema::table('memberships', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5772302')->references('id')->on('users');
            $table->unsignedBigInteger('membershiptype_id')->nullable();
            $table->foreign('membershiptype_id', 'membershiptype_fk_5772365')->references('id')->on('memberships');
        });
    }
}
