<?php

namespace Database\Factories;

use App\Domain\Company\Model\Company;
use App\Domain\User\Model\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'logo' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'address' => $this->faker->address,
            'owner_id' => User::factory(), // Assuming User model is already defined
            'symbol' => Str::upper($this->faker->unique()->word(4)),
        ];
    }
}
