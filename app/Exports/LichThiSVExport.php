<?php

namespace App\Exports;

use App\Models\LichCoiThi;
use App\Models\LichThiSinhVien;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class LichThiSVExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LichThiSinhVien::join('lichcoithi', 'lichcoithi.id', '=', 'lichthisinhvien.lichthi_id')
                ->where('sinhvien_id', Auth::user()->id)->select(
                'lichcoithi.tenmonthi', 'lichcoithi.giobatdau',
                'lichcoithi.gioketthuc', 'lichcoithi.ngaythi',
                'lichcoithi.phongthi_id', 'lichcoithi.tengiangvien1',
                'lichcoithi.tengiangvien2')->get();
    }
}
