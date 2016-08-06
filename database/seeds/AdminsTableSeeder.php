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
                'nickname' => 'Sheldon',
                'name' => '易晓东',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($data as $sd) {
            $user = new Admin();
            $user->nickname = $sd['nickname'];
            $user->name = $sd['name'];
            $user->email = $sd['email'];
            $user->password = $sd['password'];
            $user->save();
        }
    }
}
