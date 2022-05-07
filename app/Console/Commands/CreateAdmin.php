<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'create:admin';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create Movie Quote Admin';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$this->info('Hello');
		$username = $this->ask('Enter UserName');
		$email = $this->ask('Enter Email');
		$password = $this->ask('Enter Password');
		User::create([
			'username' => $username,
			'email'    => $email,
			'password' => bcrypt($password),
		]);
		$this->info('Admin Created Successfully!');
		return 0;
	}
}
