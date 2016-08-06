<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColunmInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('categories', 'admin_id')) {
            Schema::table('categories', function ($table) {
                $table->integer('admin_id')->after('id')->index();
            });
        }
        if (!Schema::hasColumn('categories', 'weight')) {
            Schema::table('categories', function ($table) {
                $table->integer('weight')->after('depth')->index();
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
