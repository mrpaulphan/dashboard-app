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
      [
        'role_id' => 1,
        'company_id' => 1,
        'first_name' => 'Paul',
        'last_name' => 'Phan',
        'email' => 'paul@mrpaulphan.com',
        'password' => Hash::make('password'),
        'phone' => '555-555-5555',
        'token' => str_random(32),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
      ],
      [
        'role_id' => 2,
        'company_id' => 1,
        'first_name' => 'Jeff',
        'last_name' => 'Matthews',
        'email' => 'jeff@matthews.com',
        'password' => Hash::make('password'),
        'phone' => '555-555-5556',
        'token' => str_random(32),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
      ],
      [
        'role_id' => 3,
        'company_id' => 1,
        'first_name' => 'Dan',
        'last_name' => 'Manella',
        'email' => 'dan@manellamedia.com',
        'password' => Hash::make('password'),
        'phone' => '555-555-5557',
        'token' => str_random(32),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
      ],
      [
        'role_id' => 4,
        'company_id' => 1,
        'first_name' => 'Ted',
        'last_name' => 'Elonis',
        'email' => 'ted@preppedelivery.com',
        'phone' => '555-555-5558',
        'password' => Hash::make('password'),
        'token' => str_random(32),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
      ]]
    );
  }
}
