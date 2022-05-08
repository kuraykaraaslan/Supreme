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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->jsonb('title');
            $table->jsonb('slug');
            $table->jsonb('content')->nullable();
            $table->jsonb('description')->nullable();
            $table->jsonb('keywords')->nullable();
            $table->string('status');
            $table->string('image')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('template')->nullable();
            $table->jsonb('available_locales')->nullable();
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
        Schema::dropIfExists('categories');
    }
};
