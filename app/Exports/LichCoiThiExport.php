<?php

namespace App\Exports;

use App\Models\LichCoiThi;
use Maatwebsite\Excel\Concerns\FromCollection;

class LichCoiThiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LichCoiThi::select(
            'tenmonthi', 'giobatdau',
            'gioketthuc', 'ngaythi',
            'phongthi_id', 'tengiangvien1',
            'tengiangvien2')->get();
    }
}
