<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num');
            $table->string('title')->unique();
            $table->text('text');
            $table->string('slug')->unique()->index();
            $table->integer('formation_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('formation_id')
                ->references('id')
                ->on('formations')
                ->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
