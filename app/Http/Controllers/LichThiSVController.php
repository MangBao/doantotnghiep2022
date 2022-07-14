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
use App\Exports\LichThiSVExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $lichcoithi = $this->lichcoithi->join('users', 'users.id', '=', 'lichcoithi.canbogiangday')
                            ->orderBy('ngaythi', 'desc')->paginate(8);
        $tintucSlide = $this->tintuc->orderBy('created_at', 'desc')->paginate(6);
        $tintuc = $this->tintuc->orderBy('id', 'asc')->paginate(8);
        $i = 1;
        if(count($lichcoithi) > 0) {
            return view('welcome', [
                'lichcoithi' => $lichcoithi,
                'tts' => $tintucSlide,
                'ttn' => $tintuc,
                'i' => $i
            ]);
        }
        return view('welcome', [
            'lichcoithi' => $lichcoithi,
            'tts' => $tintucSlide,
            'ttn' => $tintuc,
            'i' => $i,
            'notification' => 'Không có lịch thi nào'
        ]);
    }

    public function index(Request $request)
    {
        $lichthisv = $this->lichthi->orderBy('sinhvien_id', 'desc')->get();

        if($request->param) {
            if(count($lichthisv) > 0) {
                $lichthi = $this->lichcoithi->join('bomon', 'lichcoithi.bomon_id', '=', 'bomon.bomon_id')
                                ->join('users', 'users.id', '=', 'lichcoithi.canbogiangday')
                                ->where('tenmonthi', 'like', '%' . $request->param . '%')
                                ->orWhere('tengiangvien1', 'like', '%' . $request->param . '%')
                                ->orWhere('tengiangvien2', 'like', '%' . $request->param . '%')
                                ->orWhere('users.name', 'like', '%' . $request->param . '%')
                                ->orWhere('ngaythi', 'like', '%' . $request->param . '%')
                                ->orWhere('phongthi_id', 'like', '%' . $request->param . '%')
                                ->orWhere('hinhthucthi', 'like', '%' . $request->param . '%')
                                ->whereNotIn('lichcoithi.id',
                                    \DB::table('lichthisinhvien')->select('lichthi_id')->where('sinhvien_id', Auth::user()->id)
                                )
                                ->orderBy('ngaythi', 'desc')
                                ->paginate(250);
            }
            else {
                $lichthi = $this->lichcoithi->join('bomon', 'lichcoithi.bomon_id', '=', 'bomon.bomon_id')
                ->join('users', 'users.id', '=', 'lichcoithi.canbogiangday')
                ->where('tenmonthi', 'like', '%' . $request->param . '%')
                ->orWhere('tengiangvien1', 'like', '%' . $request->param . '%')
                ->orWhere('tengiangvien2', 'like', '%' . $request->param . '%')
                ->orWhere('users.name', 'like', '%' . $request->param . '%')
                ->orWhere('ngaythi', 'like', '%' . $request->param . '%')
                ->orWhere('phongthi_id', 'like', '%' . $request->param . '%')
                ->orWhere('hinhthucthi', 'like', '%' . $request->param . '%')
                ->orderBy('ngaythi', 'desc')
                ->paginate(250);
            }
        }
        else {
            if(count($lichthisv) > 0 && Auth::check()) {
                $lichthi = $this->lichcoithi->join('bomon', 'lichcoithi.bomon_id', '=', 'bomon.bomon_id')
                ->join('users', 'users.id', '=', 'lichcoithi.canbogiangday')
                ->whereNotIn('lichcoithi.id',
                    \DB::table('lichthisinhvien')->select('lichthi_id')->where('sinhvien_id', Auth::user()->id)
                )
                ->orderBy('ngaythi', 'desc')
                ->paginate(8);
            }
            else {
                $lichthi = $this->lichcoithi->join('bomon', 'lichcoithi.bomon_id', '=', 'bomon.bomon_id')
                ->join('users', 'users.id', '=', 'lichcoithi.canbogiangday')
                ->orderBy('ngaythi', 'desc')
                ->paginate(8);
            }
        }

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
            ->join('users', 'lichcoithi.canbogiangday', '=', 'users.id')
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

    public function tintuc(Request $request)
    {

        if($request->param){
            $tintuc = $this->tintuc->where('title', 'like', '%' . $request->param . '%')
                ->orWhere('heading1', 'like', '%' . $request->param . '%')
                ->orWhere('content1', 'like', '%' . $request->param . '%')
                ->orWhere('heading2', 'like', '%' . $request->param . '%')
                ->orWhere('content2', 'like', '%' . $request->param . '%')
                ->orWhere('heading3', 'like', '%' . $request->param . '%')
                ->orWhere('content3', 'like', '%' . $request->param . '%')
                ->orderBy('id', 'desc')
                ->paginate(250);
        }
        else {
            $tintuc = $this->tintuc->orderBy('id', 'asc')->paginate(6);
        }

        return view('lichthi.tintuc', [
            'ttn' => $tintuc,
        ]);
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

    public function export()
    {
        return Excel::download(new LichThiSVExport, 'lichthisv.xlsx');
    }
}
