<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;
    protected $table = 'monhoc';
    protected $fillable = [
        'monhoc_id', 'tenmonhoc', 'bomon_id', 'created_at', 'updated_at',
    ];
}
