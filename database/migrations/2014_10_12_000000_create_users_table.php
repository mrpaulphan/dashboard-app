<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
                $table->integer('role_id')->unsigned()->default(1);
                $table->integer('company_id')->unsigned()->default(1);
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email')->unique();
                $table->string('phone')->nullable()->unique();
                $table->string('avatar_url')->default('http://placehold.it/100x100');
                $table->string('password');
                $table->string('token')->unique();
                $table->rememberToken();
                $table->timestamps();
                $table->foreign('role_id')
                  ->references('id')
                  ->on('roles');
                $table->foreign('company_id')
                  ->references('id')
                  ->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
