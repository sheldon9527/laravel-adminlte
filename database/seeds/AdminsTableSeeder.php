<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'email' => '985829902@qq.com',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($data as $sd) {
            $user = new Admin();
            $user->email = $sd['email'];
            $user->password = $sd['password'];
            $user->save();
        }
    }
}
