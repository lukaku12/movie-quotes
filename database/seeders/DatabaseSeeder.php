<?php

namespace Database\Seeders;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		Quote::factory(10)->create();
//		User::factory([
//			'username' => 'luka',
//			'email'    => 'lukakurdadze2@gmail.com',
//			'password' => bcrypt('lukaku12'),
//		]);
	}
}
