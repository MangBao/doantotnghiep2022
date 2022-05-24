<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    protected $table = 'sinhvien';
    protected $fillable = [
        'id', 'sinhvien_id' , 'name', 'email', 'password', 'avatar', 'thongbaomail', 'created_at', 'updated_at'
    ];
}
