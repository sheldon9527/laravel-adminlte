<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('admins', 'avatar')) {
            Schema::table('admins', function ($table) {
                $table->string('avatar', 128)->after('email')->nullable();
            });
        }
        if (!Schema::hasColumn('admins', 'nickname')) {
            Schema::table('admins', function ($table) {
                $table->string('nickname', 45)->after('avatar')->nullable()->index();
            });
        }
        if (!Schema::hasColumn('articles', 'category_id')) {
            Schema::table('articles', function ($table) {
                $table->integer('category_id')->after('admin_id')->index();
            });
        }
        if (!Schema::hasColumn('articles', 'is_front')) {
            Schema::table('articles', function ($table) {
                $table->boolean('is_front')->after('status')->index()->default(0);
            });
        }
        if (!Schema::hasColumn('articles', 'weight')) {
            Schema::table('articles', function ($table) {
                $table->integer('weight')->after('is_front')->index()->default(0);
            });
        }

        if(Schema::hasTable('articles_tag')){
            Schema::rename('articles_tag', 'article_tag');
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
