<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'title'     => ['en' => $this->faker->sentence(), 'ka' => 'ფილმის ფრაზა'],
			'thumbnail' => $this->faker->image('public/storage/thumbnails', 640, 480, null, false),
			'movie_id'  => Movie::factory(),
		];
	}
}
