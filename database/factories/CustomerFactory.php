<?php

namespace Database\Factories;

use App\Enums\Category;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'reference' => $this->faker->unique()->bothify('REF###'),
            'category' => $this->faker->randomElement(Category::cases())->value, // Random enum value
            'description' => $this->faker->sentence(),
            'start_date' => $this->faker->date(),
        ];
    }
}
