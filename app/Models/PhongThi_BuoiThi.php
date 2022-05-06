<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongThi_BuoiThi extends Model
{
    use HasFactory;
    protected $table = 'phongthi_buoithi';
    protected $fillable = [
        'buoithi_id', 'phongthi_id', 'created_at', 'updated_at'
    ];
}
