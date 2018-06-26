<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_posts', function (Blueprint $table) {
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('posts_id');

            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('posts_id')->references('id')->on('posts');

            $table->primary(['tag_id', 'posts_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_posts');
    }
}
