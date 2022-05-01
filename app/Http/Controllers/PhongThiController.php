<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongThi;
use App\Models\GiangDuong;

class PhongThiController extends Controller
{
    private $phongthi;
    private $giangduong;
    private $htmlOptionGiangDuong;

    public function __construct(PhongThi $phongthi, GiangDuong $giangduong)
    {
        $this->phongthi = $phongthi;
        $this->giangduong = $giangduong;
        $this->htmlOptionGiangDuong = '';
        $this->middleware('auth');
        $this->middleware('permission');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phongthi = $this->phongthi->orderBy('giangduong_id', 'asc')->paginate(8);

        return view('phongthi.index', [
            'pts' => $phongthi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $giangduong = $this->giangduong->all();
        $phongthi = $this->phongthi->all();

        foreach ($giangduong as $gd) {
            $this->htmlOptionGiangDuong .= '<option value="' . $gd->giangduong_id . '">' . $gd->tengiangduong . '</option>';
        }

        return view('phongthi.create', [
            'pts' => $phongthi,
            'htmlOptionGiangDuong' => $this->htmlOptionGiangDuong,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phongthi = $this->phongthi::all();
        $giangduong = $this->giangduong->all();

        foreach($giangduong as $gd) {
            if($gd->giangduong_id == $request->giangduong_id) {
                foreach($phongthi as $pt) {
                    if($pt->phongthi_id == $request->phongthi_id) {
                        return redirect()->route('phongthi.create')->with('error', 'Phòng thi đã tồn tại');
                    }
                }
            }
        }

        $this->phongthi->create([
            'giangduong_id' => $request->giangduong_id,
            'phongthi_id' => $request->phongthi_id,
            'tenphongthi' => $request->tenphongthi,
        ]);

        return redirect()->route('phongthi.index')->with('success', 'Thêm phòng thi thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phongthi = $this->phongthi->where('phongthi_id', $id)->first();
        // $phongthi = $this->phongthi->find($id);
        $giangduong = $this->giangduong->all();
        foreach ($giangduong as $gd) {
            if ($gd->giangduong_id === $phongthi->giangduong_id) {
                $this->htmlOptionGiangDuong .= '<option value="' . $gd->giangduong_id . '" selected>' . $gd->tengiangduong . '</option>';
            } else {
                $this->htmlOptionGiangDuong .= '<option value="' . $gd->giangduong_id . '">' . $gd->tengiangduong . '</option>';
            }
        }

        return view('phongthi.edit', [
            'pts' => $phongthi,
            'htmlOptionGiangDuong' => $this->htmlOptionGiangDuong,
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
        $this->phongthi->where('phongthi_id', $id)->update([
            'giangduong_id' => $request->giangduong_id,
            'phongthi_id' => $request->phongthi_id,
            'tenphongthi' => $request->tenphongthi,
        ]);
        // $this->phongthi->find($id)->update([
        //     'giangduong_id' => $request->giangduong_id,
        //     'phongthi_id' => $request->phongthi_id,
        //     'tenphongthi' => $request->tenphongthi,
        // ]);

        return redirect()->route('phongthi.index')->with('success', 'Cập nhật phòng thi thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // $this->phongthi->find($id)->delete();
        $this->phongthi->where('phongthi_id', $id)->delete();
        return redirect()->route('phongthi.index')->with('success', 'Xóa thành công !');
    }
}
