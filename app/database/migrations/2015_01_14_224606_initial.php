<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Initial extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->timestamps();
            $table->rememberToken();

            $table->string('username', 60);
            $table->string('password', 60);
            $table->string('email', 60);
        });

        Schema::create('games', function ($table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name', 60);
            $table->string('api_key', 60);
            $table->boolean('active');
            $table->boolean('public');
            $table->unsignedInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('servers', function ($table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('game_id');
            $table->string('name', 100);
            $table->integer('current_players');
            $table->integer('max_players');
            $table->text('meta');
            $table->string('api_password', 60);

            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servers');
        Schema::drop('games');
        Schema::drop('users');
    }

}
