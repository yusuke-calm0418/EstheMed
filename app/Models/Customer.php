<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'gender_image', 'gender', 'birthdate',
        'allergy_info', 'medical_history', 'medication_info',
        'skin_concerns_goals', 'lifestyle',
        // その他のフィールド
    ];

    /**
     * 年齢を計算するアクセサ
     */
    public function getAgeAttribute()
    {
        return $this->birthdate ? Carbon::parse($this->birthdate)->age : null;
    }

    // 性別を日本語に変換するアクセサ
    public function getGenderTextAttribute()
    {
        return $this->gender === 'male' ? '男' : '女';
    }

    // 性別に基づいた画像ファイル名を返すアクセサ
    public function getGenderImageAttribute()
    {
        return $this->gender === 'male' ? 'male_image.png' : 'female_image.png';
    }
}
