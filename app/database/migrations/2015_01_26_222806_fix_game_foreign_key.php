<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixGameForeignKey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// This deletes all servers when a game is deleted
		Schema::table('servers', function($table)
		{
			$table->dropForeign('servers_game_id_foreign');
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
		//
		Schema::table('servers', function($table)
		{
			$table->dropForeign('servers_game_id_foreign');
			$table->foreign('game_id')
				->references('id')
				->on('games');
		});
	}

}
