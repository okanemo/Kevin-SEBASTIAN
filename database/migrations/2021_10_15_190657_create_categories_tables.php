<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTables extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            createDefaultTableFields($table);
            $table->string('name', 10)->nullable();
        });
    }

    public function down()
    {

        Schema::dropIfExists('categories');
    }
}
