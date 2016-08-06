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
                'admin_id' => 1,
                'name' => '系统运维',
                'weight' => 1,
            ],
            [
                'id' => 2,
                'admin_id' => 1,
                'name' => '软件工程',
                'weight' => 2,
            ],
            [
                'id' => 3,
                'admin_id' => 1,
                'name' => '云计算',
                'weight' => 3,
            ],
            [
                'id' => 4,
                'admin_id' => 1,
                'name' => '移动开发',
                'weight' => 4,
            ],
            [
                'id' => 5,
                'admin_id' => 1,
                'name' => '前端开发',
                'weight' => 5,
            ],
            [
                'id' => 6,
                'admin_id' => 1,
                'name' => '服务端开发',
                'weight' => 6,
            ],
            [
                'id' => 7,
                'admin_id' => 1,
                'name' => '编程语言',
                'weight' => 7,
            ],
            [
                'id' => 8,
                'admin_id' => 1,
                'name' => '数据库',
                'weight' => 8,
            ],
            [
                'id' => 9,
                'admin_id' => 1,
                'name' => '大数据',
                'weight' => 9,
            ],
            [
                'id' => 10,
                'admin_id' => 1,
                'name' => '企业开发',
                'weight' => 10,
            ],
            [
                'id' => 11,
                'admin_id' => 1,
                'name' => '多媒体',
                'weight' => 11,
            ],
            [
                'id' => 12,
                'admin_id' => 1,
                'name' => '游戏开发',
                'weight' => 12,
            ],
            [
                'id' => 13,
                'admin_id' => 1,
                'name' => '开源硬件',
                'weight' => 13,
            ],
            [
                'id' => 14,
                'admin_id' => 1,
                'name' => '工作经验',
                'weight' => 14,
            ],
            [
                'id' => 15,
                'admin_id' => 1,
                'name' => '操作系统',
                'weight' => 15,
            ],
            [
                'id' => 16,
                'admin_id' => 1,
                'name' => '其他类型',
                'weight' => 16,
            ],
        ];

        Category::buildTree($categories);
    }
}
