<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'giangvien_id', 'name',
        'email', 'connho',
        'password', 'bomon_id',
        'ngaysinh', 'diachi',
        'sodienthoai', 'avatar',
        'created_at', 'updated_at',
        'thongbaomail', 'role_id'
    ];
    // Tìm thông tin giảng viên theo mã giảng viên
    // public static function findUserById($idgiangvien)
    // {
    //     $giangvien = \DB::select('select * from giangvien gv, quyen_giangvien qgv
    //                             where gv.idgiangvien = qgv.idgiangvien and gv.idgiangvien = ?', [$idgiangvien]);
    //     if($giangvien)
    //         return $giangvien;
    //     else
    //         return null;
    // }

    // // Tìm thông tin giảng viên theo email
    // public static function findUserByEmail($email)
    // {
    //     $giangvien = \DB::select('select * from giangvien gv, quyen_giangvien qgv
    //                             where gv.idgiangvien = qgv.idgiangvien and gv.email = ?', [$email]);
    //     if($giangvien)
    //         return $giangvien;
    //     else
    //         return null;
    // }

    // public function getGiangVien()
    // {
    //     $giangvien = \DB::select('select idgiangvien, tengiangvien, idbomon from giangvien');
    //     if($giangvien)
    //         return $giangvien;
    //     else
    //         return null;
    // }
}
