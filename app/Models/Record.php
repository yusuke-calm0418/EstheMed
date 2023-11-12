<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = ['record_date', 'subjective', 'objective', 'assessment', 'plan', 'customer_id', 'image_path'];
    // または
    // protected $guarded = [];
}
