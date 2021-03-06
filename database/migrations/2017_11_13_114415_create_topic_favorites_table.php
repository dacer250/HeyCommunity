<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_favorites', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->index()->unsigned()->comment('User ID');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('topic_id')->index()->unsigned()->comment('Topic ID');
            $table->foreign('topic_id')->references('id')->on('topics');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_favorites');
    }
}
