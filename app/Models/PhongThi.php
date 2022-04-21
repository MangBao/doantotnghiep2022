<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongThi extends Model
{
    use HasFactory;
    protected $table = 'phongthi';
    protected $fillable = [
        'phongthi_id', 'tenphongthi', 'giangduong_id', 'created_at', 'updated_at'
    ];
}
