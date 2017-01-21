<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('projects', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('company_id')->unsigned();
          $table->string('name');
          $table->string('slug')->unique();
          $table->boolean('status')->default(true);
          $table->timestamps();
          $table->foreign('company_id')
          ->references('id')
          ->on('companies');
      });

      Schema::create('project_user', function (Blueprint $table) {
          $table->integer('project_id')
          ->unsigned()
          ->index();
          $table->foreign('project_id')
          ->references('id')
          ->on('projects')
          ->onDelete('cascade');
          $table->integer('user_id')->unsigned()->index();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_user');
        Schema::dropIfExists('projects');
    }
}
