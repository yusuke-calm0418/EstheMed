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
            // 'id' => 1,
            'name' => '山田太郎',
            'gender' => 'male',
            'gender_image' => $maleImage,
            'birthdate' => '1990-01-01',
            'last_treatment_date' => '2023-04-05',
            'memo' => '毎回お茶を差し入れしてくれる',
            'allergy_info' => '卵アレルギー、蕎麦アレルギー',
            'medical_history' => '医療処置の歴あり',
            'medication_info' => '亜鉛サプリメント多種使用',
            'skin_concerns_goals' => 'ニキビ改善',
            'lifestyle' => '飲酒：350ml/日、運動ほぼしない',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 女性のデータを挿入
        DB::table('customers')->insert([
            // 'id' => 2,
            'name' => '山田花子',
            'gender' => 'female',
            'gender_image' => $femaleImage,
            'birthdate' => '1994-07-03',
            'last_treatment_date' => '2023-04-05',
            'memo' => '毎回みかんを差し入れしてくれる',
            'allergy_info' => '小麦アレルギー、果物アレルギー、',
            'medical_history' => '2023年3月21日に医療脱毛実施。',
            'medication_info' => 'カルシウムサプリメント、ビタミンサプリメント、プロテイン、サジー',
            'skin_concerns_goals' => 'しわの予防',
            'lifestyle' => '飲酒：1L/日、ランニング1時間/日',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 他のデータを追加...
    }
}
