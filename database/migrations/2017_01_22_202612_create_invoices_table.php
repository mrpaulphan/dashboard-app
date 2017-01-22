<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('invoice_number');
            $table->longText('description');
            $table->float('rate');
            $table->integer('quantity');
            $table->decimal('sub_total');
            $table->decimal('discount');
            $table->decimal('grand_total');
            $table->string('status')->default('draft');
            $table->string('token')->unique();
            $table->date('invoice_date');
            $table->date('due_date');
            $table->timestamps();
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
