<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;



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
