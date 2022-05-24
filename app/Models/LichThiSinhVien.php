<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichThiSinhVien extends Model
{
    use HasFactory;
    protected $table = 'lichthisinhvien';
    protected $fillable = [
        'lichthi_id', 'sinhvien_id', 'created_at', 'updated_at'
    ];
}
