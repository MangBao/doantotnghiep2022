<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyen_GiangVien extends Model
{
    use HasFactory;
    protected $table = 'quyen_giangvien';
    protected $fillable = [
        'quyen_id', 'giangvien_id',
    ];
}
