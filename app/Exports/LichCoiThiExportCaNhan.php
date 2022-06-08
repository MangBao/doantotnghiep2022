<?php

namespace App\Exports;

use App\Models\LichCoiThi;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class LichCoiThiExportCaNhan implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LichCoiThi::where('user_id1', Auth::user()->user_id)->orWhere('user_id2', Auth::user()->user_id)
                ->select('tenmonthi', 'giobatdau',
                        'gioketthuc', 'ngaythi',
                        'phongthi_id', 'tengiangvien1',
                        'tengiangvien2')->get();
    }
}
