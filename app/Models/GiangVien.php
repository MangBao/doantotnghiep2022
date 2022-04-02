<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    use HasFactory;

    // Tìm thông tin giảng viên theo mã giảng viên
    public static function findUserById($idgiangvien)
    {
        $giangvien = \DB::select('select * from giangvien where idgiangvien = ?', [$idgiangvien]);
        if($giangvien)
            return $giangvien;
        else
            return null;
    }

    // Tìm thông tin giảng viên theo email
    public static function findUserByEmail($email)
    {
        $giangvien = \DB::select('select * from giangvien where email = ?', [$email]);
        if($giangvien)
            return $giangvien;
        else
            return null;
    }
}
