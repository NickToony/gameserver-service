<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixStatisticForeign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Deletes all statistics when the game is destroyed
		Schema::table('statistics', function($table)
		{
			$table->dropForeign('statistics_game_id_foreign');
			$table->foreign('game_id')
				->references('id')
				->on('games')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Restore previous foreign key
		Schema::table('statistics', function($table)
		{
			$table->dropForeign('statistics_game_id_foreign');
			$table->foreign('game_id')
				->references('id')
				->on('games');
		});
	}

}
