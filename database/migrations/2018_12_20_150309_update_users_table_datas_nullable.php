<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableDatasNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('lastname')->nullable()->change();
            $table->string('firstname')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('postal_code')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('country')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('lastname')->nullable(false)->change();
            $table->string('firstname')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            $table->string('postal_code')->nullable(false)->change();
            $table->string('city')->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
        });
    }
}
