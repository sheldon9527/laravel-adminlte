<?php

use App\User;
use Illuminate\Database\Seeder;

class AddUserTableSeeder extends Seeder
{
    public function run()
    {
        $data =  [
            [
                'name' => 'DESIGNER飞',
                'email' => 'designer1@qq.com',
                'password' =>bcrypt('123456'),
            ],
            [
                'name' => 'DESIGNER啊',
                'email' => 'designer2@qq.com',
                'password' =>bcrypt('123456'),
            ],

            [
                'name' => 'MAKER',
                'email' => 'maker1@qq.com',
                'password' =>bcrypt('123456'),
            ],

        ];

        foreach ($data as $sd) {
            $user  = new User();
            $user->name = $sd['name'];
            $user->email = $sd['email'];
            $user->password = $sd['password'];
            $user->save();
        }
    }
}
