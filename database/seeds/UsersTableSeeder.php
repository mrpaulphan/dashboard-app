<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run()
  {
    DB::table('users')->insert(
      [
      'role_id' => 1,
      'company_id' => 1,
      'first_name' => 'Paul',
      'last_name' => 'Phan',
      'email' => 'paul@mrpaulphan.com',
      'password' => Hash::make('password'),
      'token' => str_random(32),
    ]);
  }
}
