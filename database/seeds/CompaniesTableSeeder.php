<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('companies')->insert(['id' => 1, 'name' => '6K Digital', 'website' => 'https//6kDigital.com', 'street_address' => '1220 sansom street', 'city' => 'Philadelphia', 'state' => 'PA', 'zip_code' => '19107', 'email' => 'paul@mrpaulphan.com', 'phone' => '2155302751']);
    }
}
