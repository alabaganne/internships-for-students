<?php

namespace Database\Factories;

use App\Models\Internship;
use Illuminate\Database\Eloquent\Factories\Factory;

class InternshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Internship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		$temp = rand(1, 10);

        return [
            'title' => ucfirst($this->faker->words(5, true)),
            'description' => $this->faker->text(2400),
            'field_id' => rand(1, 10),
            'company_id' => $temp,
			'city_id' => $temp,
            'closing_at' => $this->faker->dateTimeBetween('now', '+6 months')
        ];
    }
}
