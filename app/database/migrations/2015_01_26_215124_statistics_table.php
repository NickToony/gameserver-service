<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatisticsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('statistics', function ($table) {
			$table->increments('id');
			$table->timestamps();

			// Variables worth tracking
			$table->unsignedInteger('current_players');
			$table->unsignedInteger('max_players');
			$table->unsignedInteger('total_servers');

			// Foreign keys
			$table->unsignedInteger('game_id');

			// Relationship
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
		Schema::drop('statistics');
	}

}
