<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpdateStatistics extends ScheduledCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'server:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Updates statistics of all servers';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * When a command should run
	 *
	 * @param Scheduler $scheduler
	 * @return \Indatus\Dispatcher\Scheduling\Schedulable
	 */
	public function schedule(Schedulable $scheduler)
	{
		return $scheduler->everyMinutes(60);
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$games = Game::where('active', '=', 1)->get();
		foreach ($games as $game) {
			$statistic = new Statistic;
			$statistic->current_players = $game->server->sum("current_players");
			$statistic->max_players = $game->server->sum("max_players");
			$statistic->total_servers = $game->server->count();
			$statistic->game_id = $game->id;
			$statistic->save();
		}

		$date = new DateTime;
		$date->modify('-1 month');
		$formatted_date = $date->format('Y-m-d H:i:s');

		Statistic::where('created_at', "<", $formatted_date)->delete();
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(

		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(

		);
	}

}
