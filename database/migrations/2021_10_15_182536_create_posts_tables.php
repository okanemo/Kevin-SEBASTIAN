<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTables extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            $table->string('title', 200)->nullable();
            $table->string('headline', 200)->nullable();
            $table->text('description')->nullable();
            $table->integer('read')->default('0');
            $table->integer('author_id')->unsigned()->index()->nullable();
            $table->integer('category_id')->unsigned()->index()->nullable();
        });

        Schema::create('post_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'post');
        });
    }

    public function down()
    {

        Schema::dropIfExists('post_slugs');
        Schema::dropIfExists('posts');
    }
}
