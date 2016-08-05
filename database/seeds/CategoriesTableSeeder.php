<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = [
            [
                'id' => 1,
                'name' => '系统运维',
            ],
            [
                'id' => 2,
                'name' => '软件工程',
            ],
            [
                'id' => 3,
                'name' => '云计算',
            ],
            [
                'id' => 4,
                'name' => '移动开发',
            ],
            [
                'id' => 5,
                'name' => '前端开发',
            ],
            [
                'id' => 6,
                'name' => '服务端开发',
            ],
            [
                'id' => 7,
                'name' => '编程语言',
            ],
            [
                'id' => 8,
                'name' => '数据库',
            ],
            [
                'id' => 10,
                'name' => '企业开发',
            ],
            [
                'id' => 11,
                'name' => '多媒体',
            ],
            [
                'id' => 12,
                'name' => '游戏开发',
            ],
            [
                'id' => 13,
                'name' => '开源硬件',
            ],
            [
                'id' => 14,
                'name' => '工作经验',
            ],
            [
                'id' => 15,
                'name' => '操作系统',
            ],
            [
                'id' => 16,
                'name' => '其他类型',
            ],
        ];

        Category::buildTree($categories);
    }
}
