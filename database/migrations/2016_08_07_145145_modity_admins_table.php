<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModityAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('admins', 'gitHub_name')) {
            Schema::table('admins', function ($table) {
                $table->string('gitHub_name',125)->after('blog_url')->nullable();
            });
        }
        if (!Schema::hasColumn('admins', 'sina_id')) {
            Schema::table('admins', function ($table) {
                $table->string('sina_id',125)->after('gitHub_name')->nullable();
            });
        }
        if (!Schema::hasColumn('admins', 'linked_in')) {
            Schema::table('admins', function ($table) {
                $table->string('linked_in',125)->after('sina_id')->nullable();
            });
        }
        if (!Schema::hasColumn('admins', 'twitter')) {
            Schema::table('admins', function ($table) {
                $table->string('twitter',125)->after('linked_in')->nullable();
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
