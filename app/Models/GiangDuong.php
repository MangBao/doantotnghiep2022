<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangDuong extends Model
{
    use HasFactory;

    protected $table = 'giangduong';
    protected $fillable = [
        'giangduong_id',
        'tengiangduong',
        'created_at', 'updated_at'
    ];
}
