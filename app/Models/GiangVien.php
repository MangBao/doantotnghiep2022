<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'user_id', 'name',
        'email', 'connho',
        'password', 'bomon_id',
        'ngaysinh', 'diachi',
        'sodienthoai', 'avatar',
        'created_at', 'updated_at',
        'thongbaomail', 'role_id',
        'trangthaihoatdong',
    ];
}
