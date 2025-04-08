<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomElement(['$10.000', '50.000', '100.000']),
            'location' => 'Remote',
            'featured' => $this->faker->randomElement([1, 0]),
            'url' => $this->faker->url(),
            'schedule' => 'Full-time',
            'employer_id' => Employer::factory(),
        ];
    }
}
