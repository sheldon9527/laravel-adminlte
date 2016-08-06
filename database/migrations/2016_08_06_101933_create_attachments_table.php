<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned()->index();
            $table->string('attachable_type',255)->nullable();
            $table->integer('attachable_id')->unsigned()->index();
            $table->string('relative_path',255)->nullable();
            $table->string('filename',128)->nullable();
            $table->text('description')->nullable();
            $table->string('tag',45)->nullable();
            $table->double('width');
            $table->double('height');
            $table->string('mime_types',45)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        if (!Schema::hasColumn('admins', 'name')) {
            Schema::table('admins', function ($table) {
                $table->string('name',45)->after('nickname')->nullable();
            });
        }
        if (!Schema::hasColumn('admins', 'birthday')) {
            Schema::table('admins', function ($table) {
                $table->timestamp('birthday')->after('name')->nullable();
            });
        }
        if (!Schema::hasColumn('admins', 'blog_url')) {
            Schema::table('admins', function ($table) {
                $table->string('blog_url',255)->after('birthday')->unique();
            });
        }
        if (!Schema::hasColumn('admins', 'gender')) {
            Schema::table('admins', function ($table) {
                $table->enum('gender', ['male','female','secret'])->after('blog_url')->default('secret')->index();
            });
        }
        if (!Schema::hasColumn('admins', 'status')) {
            Schema::table('admins', function ($table) {
                $table->enum('status', ['active','inactive'])->after('gender')->default('active')->index();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
