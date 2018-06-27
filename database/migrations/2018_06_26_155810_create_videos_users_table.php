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
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('video_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('video_id')->references('id')->on('videos');

            $table->primary(['user_id', 'video_id']);
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
