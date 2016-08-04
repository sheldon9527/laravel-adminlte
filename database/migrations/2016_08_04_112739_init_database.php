<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitDatabase extends Migration
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
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->timestamps();
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique()->index();
            $table->string('password', 60);
            $table->timestamps();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned();
            $table->string('title',255)->index();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('catalog')->nullable();
            $table->enum('status', ['active','inactive'])->default('active')->index();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('articles_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();
        });


        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('name')->index();
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
        Schema::drop('users');
        Schema::drop('admins');
        Schema::drop('articles');
        Schema::drop('articles_tag');
        Schema::drop('tags');
    }
}
