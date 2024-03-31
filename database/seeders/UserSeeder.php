<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'name' => 'Marcel Stadelmann',
      'email' => 'm@marceli.to',
      'password' => \Hash::make('7aq31rr23'),
      'email_verified_at' => now(),
    ]);
  }
}
