<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMODELSTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('categories', function(Blueprint $table) {
        $table->increments('id');
        $table->string('name', 255)->nullable()->index();
        $table->integer('parent_id')->nullable()->index()->default(0);
        $table->integer('lft')->nullable()->index();
        $table->integer('rgt')->nullable()->index();
        $table->integer('depth')->nullable();
        $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('categories');
  }

}
