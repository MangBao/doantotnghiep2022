<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichCoiThi extends Model
{
    use HasFactory;

    protected $table = 'lichcoithi';
    protected $fillable = [
        'id', 'tenmonthi',
        'cathi_id', 'giobatdau',
        'gioketthuc', 'phongthi_id',
        'ngaythi', 'giangvien_id1',
        'tengiangvien1', 'giangvien_id2',
        'tengiangvien2','bomon_id',
        'created_at', 'updated_at'
    ];
    public static function getLichThi()
    {
        $lichthi = \DB::select('select * from buoithi b, cathi_buoithi cb, cathi c, phongthi_buoithi ptb, monthi_buoithi mb, monhoc m
                where b.id = cb.buoithi_id and b.id = ptb.buoithi_id and b.id = mb.buoithi_id and cb.cathi_id = c.cathi_id and mb.monthi_id = m.monhoc_id');
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
