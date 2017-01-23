<?php

use Illuminate\Database\Seeder;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('invoices')->insert([
          [
            'id' => 120,
            'user_id' => 3,
            'invoice_number' => 'IN-120',
            'description' => 'CMS Build',
            'rate' => '50',
            'quantity' => '1',
            'sub_total' => '1000.00',
            'discount' => '00.00',
            'grand_total' => '1000.00',
            'status' => 'sent',
            'token' => str_random(32),
            'invoice_date' => \Carbon\Carbon::now(),
            'due_date' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
          ],
          [
            'id' => 121,
            'user_id' => 3,
            'invoice_number' => 'IN-121',
            'description' => 'Logo',
            'rate' => '50',
            'quantity' => '1',
            'sub_total' => '550.00',
            'discount' => '50.00',
            'grand_total' => '500.00',
            'status' => 'draft',
            'token' => str_random(32),
            'invoice_date' => \Carbon\Carbon::now(),
            'due_date' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
          ],
          [
            'id' => 122,
            'user_id' => 4,
            'invoice_number' => 'IN-122',
            'description' => 'Front-End Build',
            'rate' => '50',
            'quantity' => '1',
            'sub_total' => '2000.00',
            'discount' => '00.00',
            'grand_total' => '2000.00',
            'status' => 'paid',
            'token' => str_random(32),
            'invoice_date' => \Carbon\Carbon::now(),
            'due_date' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
          ],
           [
              'id' => 123,
              'user_id' => 5,
              'invoice_number' => 'IN-123',
              'description' => 'UX',
              'rate' => '50',
              'quantity' => '1',
              'sub_total' => '3232.00',
              'discount' => '00.00',
              'grand_total' => '1000.00',
              'status' => 'paid',
              'token' => str_random(32),
              'invoice_date' => \Carbon\Carbon::now(),
              'due_date' => \Carbon\Carbon::now(),
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ]
      ]
      );
    }
}
