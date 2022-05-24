<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\LichThiSinhVien;
use App\Models\LichCoiThi;
use App\Models\BoMon;
use App\Models\TinTuc;

class LichThiSVController extends Controller
{
    private $sinhvien;
    private $lichthi;
    private $lichcoithi;
    private $bomon;
    private $tintuc;

    public function __construct(SinhVien $sinhvien, LichThiSinhVien $lichthisinhvien, LichCoiThi $lichcoithi, BoMon $bomon, TinTuc $tintuc) {
        $this->sinhvien = $sinhvien;
        $this->lichthi = $lichthisinhvien;
        $this->lichcoithi = $lichcoithi;
        $this->bomon = $bomon;
        $this->tintuc = $tintuc;
    }
    public function homepage()
    {
        $lichcoithi = $this->lichcoithi->orderBy('ngaythi', 'desc')->paginate(8);
        $i = 1;
        if(count($lichcoithi) > 0) {
            return view('welcome', [
                'lichcoithi' => $lichcoithi,
                'i' => $i
            ]);
        }
        return view('welcome', [
            'lichcoithi' => $lichcoithi,
            'notification' => 'Không có lịch thi nào'
        ]);
    }
    public function index()
    {
        $lichthi = $this->lichcoithi->join('bomon', 'lichcoithi.bomon_id', '=', 'bomon.bomon_id')
            ->orderBy('id', 'asc')
            ->paginate(8);

        $i = 1;

        if(count($lichthi) > 0) {
            return view('lichthi.index', [
                'lichthi' => $lichthi,
                'i' => $i,
            ]);
        }
        return view('lichthi.index', [
            'lichthi' => $lichthi,
            'notification' => 'Không có lịch thi nào',
        ]);
    }

    public function lichcuatoi()
    {
        $sinhvien = \Session::get('sinhvien');
        $lichthi = LichThiSinhVien::where('sinhvien_id', $sinhvien['sinhvien_id'])->get();
        if($lichthi->count() > 0)
        {
            return view('sinhvien.lichthi', [
                'lichthi' => $lichthi,
            ]);
        }
        else
        {
            return view('sinhvien.lichthi', [
                'lichthi' => null,
                'notification' => 'Không có lịch thi nào',
            ]);
        }
    }
    public function store(Request $request)
    {
    }
}
