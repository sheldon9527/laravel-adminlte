<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
use App\Models\AdminDescription;

class UpdateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '更新用户信息';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $admins = Admin::all();

        // 多少个任务
        $bar = $this->output->createProgressBar(count($admins));

        foreach ($admins as $admin) {
            if (!$admin->description) {
                $description = new AdminDescription();
                $description->admin_id = $admin->id;

                $description->save();
            }
            $bar->advance();
        }

        $bar->finish();

        $this->info('DONE');
    }
}
