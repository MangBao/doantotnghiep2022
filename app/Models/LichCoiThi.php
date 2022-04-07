<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichCoiThi extends Model
{
    public static function getLichThi()
    {
        $lichthi = \DB::select('select * from monthi mt, cathi ct, phongthi_ca ptc where mt.idmonthi = ptc.idmonthi and ptc.idca = ct.idca ORDER BY ptc.ngaythi');
        if($lichthi)
            return $lichthi;
        else
            return null;
    }
}
