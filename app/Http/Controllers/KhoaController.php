<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khoa;
use App\Models\BoMon;
use App\Models\MonHoc;
use App\Models\User;
use App\Models\BuoiThi;
use App\Models\PhongThi_BuoiThi;
use App\Models\MonThi_BuoiThi;
use App\Models\CaThi_BuoiThi;


class KhoaController extends Controller
{
    private $khoa;
    private $bomon;
    private $monhoc;
    private $giangvien;
    private $buoithi;
    private $phongthi_buoithi;
    private $monthi_buoithi;
    private $cathi_buoithi;

    public function __construct(Khoa $khoa, BoMon $bomon, MonHoc $monhoc, User $giangvien, BuoiThi $buoithi, PhongThi_BuoiThi $phongthi_buoithi, MonThi_BuoiThi $monthi_buoithi, CaThi_BuoiThi $cathi_buoithi) {
        $this->khoa = $khoa;
        $this->bomon = $bomon;
        $this->monhoc = $monhoc;
        $this->giangvien = $giangvien;
        $this->buoithi = $buoithi;
        $this->phongthi_buoithi = $phongthi_buoithi;
        $this->monthi_buoithi = $monthi_buoithi;
        $this->cathi_buoithi = $cathi_buoithi;
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('sinhvien');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khoas = $this->khoa->orderBy('khoa_id', 'asc')->paginate(8);
        $i = 1;

        return view('khoa.index', [
            'ks' => $khoas,
            'i' => $i
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('khoa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $khoa = $this->khoa::where('khoa_id', $request->khoa_id)->first();

        if($khoa) {
            \Session::put('khoa', [
                'khoa_id' => $request->khoa_id,
                'tenkhoa' => $request->tenkhoa,
            ]);
            return redirect()->route('khoa.create')->with('error', 'Mã khoa đã tồn tại');
        } else {
            $this->khoa->create([
                'khoa_id' => $request->khoa_id,
                'tenkhoa' => $request->tenkhoa,
            ]);
            return redirect()->route('khoa.index')->with('success', 'Thêm khoa thành công');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khoa = $this->khoa->where('khoa_id', $id)->first();

        return view('khoa.edit', [
            'k' => $khoa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->khoa->where('khoa_id', $id)->update([
            'khoa_id' => $request->khoa_id,
            'tenkhoa' => $request->tenkhoa,
        ]);

        return redirect()->route('khoa.index')->with('success', 'Cập nhật khoa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if($id == 'CNTT'){
            return redirect()->route('khoa.index')->with('error', 'Không thể xóa khoa CNTT');
        } else {
            $this->phongthi_buoithi->join('buoithi', 'buoithi.id', '=', 'phongthi_buoithi.buoithi_id')
                                ->join('monthi_buoithi', 'monthi_buoithi.monthi_id', '=', 'buoithi.id')->join('monhoc', 'monhoc.monhoc_id', '=', 'monthi_buoithi.monthi_id')
                                ->join('bomon', 'bomon.bomon_id', '=', 'monhoc.bomon_id')->where('bomon.khoa_id', $id)
                                ->delete();
            $this->cathi_buoithi->join('buoithi', 'buoithi.id', '=', 'cathi_buoithi.buoithi_id')
                                ->join('monthi_buoithi', 'monthi_buoithi.monthi_id', '=', 'buoithi.id')->join('monhoc', 'monhoc.monhoc_id', '=', 'monthi_buoithi.monthi_id')
                                ->join('bomon', 'bomon.bomon_id', '=', 'monhoc.bomon_id')->where('bomon.khoa_id', $id)
                                ->delete();
            $this->monthi_buoithi->join('monhoc', 'monhoc.monhoc_id', '=', 'monthi_buoithi.monthi_id')
                                ->join('bomon', 'bomon.bomon_id', '=', 'monhoc.bomon_id')->where('bomon.khoa_id', $id)
                                ->delete();

            $this->giangvien->join('bomon', 'users.bomon_id', '=', 'bomon.bomon_id')->where('bomon.khoa_id', $id)->delete();
            $this->monhoc->join('bomon', 'monhoc.bomon_id', '=', 'bomon.bomon_id')
                ->where('bomon.khoa_id', $id)
                ->delete();
            $this->bomon->where('khoa_id', $id)->delete();
            $this->khoa->where('khoa_id', $id)->delete();
        }


        return redirect()->route('khoa.index')->with('success', 'Xóa thành công');
    }
}
