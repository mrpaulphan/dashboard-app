<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('roles')->insert(
        [
          ['name' => 'admin'],
          ['name' => 'employee'],
          ['name' => 'contractor'],
          ['name' => 'client'],
        ]);
    }
}
