<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_video', function (Blueprint $table) {
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('video_id');

            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');

            //$table->primary(['tag_id', 'video_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_video');
    }
}
