<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\LichThiSinhVien;
use App\Models\LichCoiThi;
use App\Models\BoMon;
use App\Models\TinTuc;
use App\Models\User;

class LichThiSVController extends Controller
{
    private $lichthi;
    private $lichcoithi;
    private $bomon;
    private $tintuc;
    private $sinhvien;

    public function __construct(LichThiSinhVien $lichthisinhvien, LichCoiThi $lichcoithi, BoMon $bomon, TinTuc $tintuc, User $sinhvien) {
        $this->lichthi = $lichthisinhvien;
        $this->lichcoithi = $lichcoithi;
        $this->bomon = $bomon;
        $this->tintuc = $tintuc;
        $this->sinhvien = $sinhvien;
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
        $lichthisv = $this->lichthi->orderBy('sinhvien_id', 'desc')->get();
        if(count($lichthisv) > 0) {
            $lichthi = $this->lichcoithi->join('bomon', 'lichcoithi.bomon_id', '=', 'bomon.bomon_id')
            ->whereNotIn('lichcoithi.id',
                \DB::table('lichthisinhvien')->select('lichthi_id')->where('sinhvien_id', Auth::user()->id)
            )
            ->orderBy('lichcoithi.id', 'asc')
            ->paginate(8);
        }
        $lichthi = $this->lichcoithi->join('bomon', 'lichcoithi.bomon_id', '=', 'bomon.bomon_id')
            ->orderBy('lichcoithi.id', 'asc')
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
        $lichthi = LichThiSinhVien::join('lichcoithi', 'lichthisinhvien.lichthi_id', '=', 'lichcoithi.id')
            ->join('bomon', 'lichcoithi.bomon_id', '=', 'bomon.bomon_id')
            ->where('sinhvien_id', auth()->user()->id)
            ->orderBy('sinhvien_id', 'asc')
            ->paginate(5);

        $i = 1;
        if($lichthi->count() > 0)
        {
            return view('lichthi.lichcuatoi', [
                'lichthi' => $lichthi,
                'i' => $i,
            ]);
        }
        else
        {
            return view('lichthi.lichcuatoi', [
                'lichthi' => $lichthi,
                'notification' => 'Không có lịch thi nào',
            ]);
        }
    }

    public function store($id)
    {
        if($this->lichthi->where('sinhvien_id', auth()->user()->id)->where('lichthi_id', $id)->count() > 0)
        {
            return redirect()->route('lichthisv.index')->with('error', 'Bạn đã thêm lịch thi này rồi');
        }
        $this->lichthi->create([
            'lichthi_id' => $id,
            'sinhvien_id' => auth()->user()->id,
        ]);
        return redirect()->route('lichthisv.index')->with('success', 'Thêm lịch thi thành công');
    }

    public function updatethongbao(Request $request)
    {

        if($request->thongbaomail == 0) {
            $this->sinhvien->find(Auth::user()->id)->update([
                'thongbaomail' => $request->thongbaomail
            ]);
            return redirect()->route('lichthisv.lichcuatoi')->with('success', 'Tắt thông báo thành công');
            dd($this->user->find(Auth::id()));
        }
        else {
            $this->sinhvien->find(Auth::user()->id)->update([
                'thongbaomail' => $request->thongbaomail
            ]);
            return redirect()->route('lichthisv.lichcuatoi')->with('success', 'Bật thông báo thành công');
        }
    }

    public function delete($id)
    {
        $this->lichthi->where('sinhvien_id', auth()->user()->id)->where('lichthi_id', $id)->delete();
        return redirect()->route('lichthisv.lichcuatoi')->with('success', 'Xóa lịch thi thành công');
    }
}
