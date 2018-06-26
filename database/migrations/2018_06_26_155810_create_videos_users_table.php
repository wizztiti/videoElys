<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos_users', function (Blueprint $table) {
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('videos_id');

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('videos_id')->references('id')->on('videos');

            $table->primary(['users_id', 'videos_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos_users');
    }
}
