<?php

namespace Kuraykaraaslan\Supreme\Migrations;


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->jsonb('title');
            $table->string('slug');
            $table->jsonb('content');
            $table->jsonb('description')->nullable();
            $table->jsonb('keywords')->nullable();
            $table->bigInteger('category_id')->unsigned();
            $table->string('status');
            $table->string('user_id');
            $table->string('image')->nullable();
            $table->jsonb('translations')->nullable();

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
        Schema::dropIfExists('posts');
    }
};