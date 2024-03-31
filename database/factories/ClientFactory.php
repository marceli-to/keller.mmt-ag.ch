<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    // use faker for swiss german
    $this->faker->addProvider(new \Faker\Provider\de_CH\Company($this->faker));
    $this->faker->addProvider(new \Faker\Provider\de_CH\Address($this->faker));
    return [
      'name' => $this->faker->company,
      'acronym' => $this->faker->unique()->regexify('[A-Z]{3}'),
      'byline' => $this->faker->companySuffix,
      'street' => $this->faker->streetAddress,
      'zip' => $this->faker->postcode,
      'city' => $this->faker->city,
    ];
  }
}
