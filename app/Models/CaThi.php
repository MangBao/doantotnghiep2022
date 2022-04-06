<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaThi extends Model
{
    use HasFactory;

    public function getCaThi()
    {
        // $cathi = \DB::select('select * from cathi ct, quyen_giangvien qgv
        //                             where gv.idgiangvien = qgv.idgiangvien and gv.idgiangvien = ?', [$idgiangvien]);
        // if($cathi)
        //     return $cathi;
        // else
        //     return null;
    }
}
