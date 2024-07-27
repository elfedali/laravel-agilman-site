<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Sprint;
use App\Models\Task;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'sprint_id' => Sprint::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(),
            'status' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'expected_end_date' => $this->faker->date(),
        ];
    }
}
