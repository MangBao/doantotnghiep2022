<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonThi_BuoiThi extends Model
{
    use HasFactory;
    protected $table = 'monthi_buoithi';
    protected $fillable = [
        'buoithi_id', 'monthi_id', 'created_at', 'updated_at'
    ];
}
