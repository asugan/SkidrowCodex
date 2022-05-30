<?php

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
            $table->integer('category_id');
            $table->timestamps();
            $table->string('post_name')->nullable();
            $table->text('post_body')->nullable();
            $table->string('slug')->unique();
            $table->string('keywords')->nullable();
            $table->string('category_name')->nullable();
            $table->string('developer')->nullable();
            $table->string('release_year')->nullable();
            $table->string('game_version')->nullable();
            $table->string('size')->nullable();
            $table->string('dlcs')->nullable();
            $table->string('steam_link')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->text('t_link')->nullable();
            $table->string('recommended')->nullable();
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