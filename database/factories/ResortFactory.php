<?php

namespace Database\Factories;

use App\Models\Resort;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resort>
 */
class ResortFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resort::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->company(),
            'description' => $this->faker->paragraph(rand(2, 10)),
            'city' => $this->faker->city(),
            'price' => rand(0, 1),
            'image' => 'images/1648626660.jpg',

        ];
    }
}
