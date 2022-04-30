<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichCoiThi extends Model
{
    public static function getLichThi()
    {
        $lichthi = \DB::select('select * from buoithi');
        if($lichthi)
            return $lichthi;
        else
            return null;
    }

    public static function getGiangVien()
    {
        $giangvien = \DB::select('select * from users');
        if($giangvien)
            return $giangvien;
        else
            return null;
    }

    public static function getMonHoc()
    {
        $monhoc = \DB::select('select * from monhoc');
        if($monhoc)
            return $monhoc;
        else
            return null;
    }
}
