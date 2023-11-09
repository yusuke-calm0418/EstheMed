<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;



    // 男を入力したら自動で画像が選択される
    public function getGenderImageAttribute()
    {
        return $this->attributes['gender'] === 'male' ? 'male_image.png' : 'female_image.png';
    }

}
