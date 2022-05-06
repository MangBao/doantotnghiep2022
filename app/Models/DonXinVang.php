<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonXinVang extends Model
{
    use HasFactory;
    protected $table = 'donxinvang';
    protected $fillable = ['id', 'giangvien_id', 'lydo', 'cathi_id', 'trangthai', 'ngayxinvang', 'created_at', 'updated_at'];
}
