<?php
namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $faker = \Faker\Factory::create();

    for($i = 0; $i < 10; $i++) {
      Post::create([
        // random date in the past
        'date' => now()->subDays(rand(1, 100)),
        'text' => $faker->text(400),
        'published' => rand(1, 100) <= 80,
      ]);
    }
  }
}
