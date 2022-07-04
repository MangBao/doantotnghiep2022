<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuoiThi extends Model
{
    use HasFactory;
    protected $table = 'buoithi';
    protected $fillable = [
        'id', 'canbogiangday', 'ngaythi', 'hinhthucthi', 'created_at', 'updated_at'
    ];
}
