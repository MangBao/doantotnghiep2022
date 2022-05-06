<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DonXinVang;
use App\Models\GiangVien;
use App\Models\Khoa;
use App\Models\Bomon;

class DonXinVangController extends Controller
{
    private $donxinvang;
    private $giangvien;
    private $khoa;
    private $bomon;

    public function __construct(DonXinVang $donxinvang, GiangVien $giangvien, Khoa $khoa, Bomon $bomon) {
        $this->donxinvang = $donxinvang;
        $this->giangvien = $giangvien;
        $this->khoa = $khoa;
        $this->bomon = $bomon;
        $this->middleware('auth');
        $this->middleware('permission');
    }

    public function index()
    {
        $donxinvangs = $this->donxinvang->join('users', 'users.id', '=', 'donxinvang.giangvien_id')
                        ->join('bomon', 'bomon.bomon_id', '=', 'users.bomon_id')
                        ->join('khoa', 'khoa.khoa_id', '=', 'bomon.khoa_id')
                        ->select('donxinvang.*', 'users.name', 'khoa.khoa_id', 'bomon.bomon_id')
                        ->get();
        $i = 1;
        // dd($donxinvangs);
        if(count($donxinvangs) > 0){
            return view('donxinvang.index',[
                'donxinvangs' => $donxinvangs,
                'i' => $i,
            ]);
        }

        return view('donxinvang.index',[
            'donxinvangs' => $donxinvangs,
            'notification' => 'Không có dữ liệu',
        ]);
    }

    public function store(Request $request){
        $donxinvang = $this->donxinvang->where('giangvien_id', Auth::user()->id)->first();

        if(!is_null($donxinvang)) {
            if($donxinvang->cathi_id == $request->cathi_id && $donxinvang->ngayxinvang == $request->ngayxinvang){
                return redirect()->back()->with('error', 'Bạn đã đăng ký xin vắng trong ngày này');
            }
        }

        $this->donxinvang->create([
            'lydo' => $request->lydo,
            'giangvien_id' => Auth::user()->id,
            'cathi_id' => $request->cathi_id,
            'ngayxinvang' => $request->ngayxinvang,
        ]);

        return redirect()->route('lichcoithi.cuatoi')->with('success', 'Đã xin vắng, xin chờ phê duyệt');
    }

    public function duyetdon($id){
        $this->donxinvang->find($id)->update([
            'trangthai' => 1,
        ]);
        return redirect()->route('donxinvang.index')->with('success','Xác nhận vắng thành công');
    }

    public function delete($id){
        $this->donxinvang->find($id)->delete();
        return redirect()->route('donxinvang.index')->with('success', 'Xóa thành công');
    }
}
