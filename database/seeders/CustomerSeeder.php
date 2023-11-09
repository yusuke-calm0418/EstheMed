<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 男性の場合の画像ファイル名
        $maleImage = 'male_image.png';
        // 女性の場合の画像ファイル名
        $femaleImage = 'female_image.png';

        // 男性のデータを挿入
        DB::table('customers')->insert([
            'id' => 1,
            'name' => '山田太郎',
            'gender' => 'male',
            'gender_image' => $maleImage,
            'birthdate' => '1990-01-01',
            'last_treatment_date' => '2023-04-05',
            'memo' => '毎回お茶を差し入れしてくれる',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 女性のデータを挿入
        DB::table('customers')->insert([
            'id' => 2,
            'name' => '山田花子',
            'gender' => 'female',
            'gender_image' => $femaleImage,
            'birthdate' => '1994-07-03',
            'last_treatment_date' => '2023-04-05',
            'memo' => '毎回みかんを差し入れしてくれる',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 他のデータを追加...
    }
}
