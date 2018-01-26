<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostsTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // A tabela intermediaria deve ter o mesmo nome dos seus model e em ordem alfabetica
        Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts');

            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_tags');
    }
}
