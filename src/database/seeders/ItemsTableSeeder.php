<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

// 1:良好
// 2:目立った傷や汚れなし
// 3:やや傷や汚れあり
// 4:状態が悪い

    public function run()
    {
        Item::create([
            'user_id' => 1,
            'name' => '腕時計',
            'brand_name' => 'Rolax',
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'price' => 15000,
            'image' => 'dummy.jpg',
            'condition' => 1,
            'is_sold' => true,
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'HDD',
            'brand_name' => '西芝',
            'description' => '高速で信頼性の高いハードディスク',
            'price' => 5000,
            'image' => 'dummy.jpg',
            'condition' => 2,
            'is_sold' => false,
        ]);

        Item::create([
            'user_id' => 1,
            'name' => '玉ねぎ3束',
            'brand_name' => null,
            'description' => '新鮮な玉ねぎ3束のセット',
            'price' => 300,
            'image' => 'dummy.jpg',
            'condition' => 3,
            'is_sold' => false,
        ]);

        Item::create([
            'user_id' => 1,
            'name' => '革靴',
            'brand_name' => null,
            'description' => 'クラシックなデザインの革靴',
            'price' => 4000,
            'image' => 'dummy.jpg',
            'condition' => 4,
            'is_sold' => false,
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'ノートPC',
            'brand_name' => null,
            'description' => '高性能なノートパソコン',
            'price' => 45000,
            'image' => 'dummy.jpg',
            'condition' => 1,
            'is_sold' => false,
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'マイク',
            'brand_name' => null,
            'description' => '高音質のレコーディング用マイク',
            'price' => 8000,
            'image' => 'dummy.jpg',
            'condition' => 2,
            'is_sold' => true,
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'ショルダーバッグ',
            'brand_name' => null,
            'description' => 'おしゃれなショルダーバッグ',
            'price' => 3500,
            'image' => 'dummy.jpg',
            'condition' => 3,
            'is_sold' => false,
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'タンブラー',
            'brand_name' => null,
            'description' => '使いやすいタンブラー',
            'price' => 500,
            'image' => 'dummy.jpg',
            'condition' => 4,
            'is_sold' => false,
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'コーヒーミル',
            'brand_name' => 'Starbacks',
            'description' => '使いやすいタンブラー',
            'price' => 500,
            'image' => 'dummy.jpg',
            'condition' => 4,
            'is_sold' => false,
        ]);

        Item::create([
            'user_id' => 1,
            'name' => 'メイクセット',
            'brand_name' => null,
            'description' => '便利なメイクアップセット',
            'price' => 2500,
            'image' => 'dummy.jpg',
            'condition' => 2,
            'is_sold' => false,
        ]);


    }
}
