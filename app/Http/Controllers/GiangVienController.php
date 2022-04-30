<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DSQuyen;
use App\Models\Quyen_GiangVien;
use App\Models\Bomon;
use App\Models\GiangVien;

class GiangVienController extends Controller
{
    private $htmlOptionQuyen;
    private $htmlOptionBoMon;
    private $giangvien;
    private $dsquyen;

    public function __construct(GiangVien $giangvien, DSQuyen $dsquyen, Quyen_GiangVien $quyen_giangvien, Bomon $bomon) {
        $this->htmlOptionQuyen = '';
        $this->giangvien = $giangvien;
        $this->dsquyen = $dsquyen;
        $this->quyen_giangvien = $quyen_giangvien;
        $this->bomon = $bomon;
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
        $gvs = $this->giangvien::latest()->paginate(8);
        $i = 1;
        return view('giangvien.index',[
            'gvs' => $gvs,
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
        $gvs = $this->giangvien::all();
        $dsq = $this->dsquyen::all();
        $bm = $this->bomon::all();
        $giangvien_id = '2022' . rand(100, 999);

        // Option quyen
        foreach($dsq as $d){
            $this->htmlOptionQuyen .= '<option value="'.$d->quyen_id.'">'.$d->tenquyen.'</option>';
        }
        // Option bo mon
        foreach($bm as $b){
            $this->htmlOptionBoMon .= '<option value="'.$b->bomon_id.'">'.$b->tenbomon.'</option>';
        }
        // Kiểm tra mã giảng viên trùng
        foreach($gvs as $gv) {
            if($gv->giangvien_id == $giangvien_id){
                $giangvien_id = '2022' . rand(100, 999);
            }
        }

        return view('giangvien.create', [
            'htmlOptionQuyen' => $this->htmlOptionQuyen,
            'giangvien_id' => $giangvien_id,
            'htmlOptionBoMon' => $this->htmlOptionBoMon
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
        $this->giangvien->create([
            'giangvien_id' => $request->giangvien_id,
            'name' => $request->tengiangvien,
            'email' => $request->email,
            'connho' => $request->connho,
            'ngaysinh' => $request->ngaysinh,
            'diachi' => $request->diachi,
            'sodienthoai' => $request->sdt,
            'avatar' => $request->avatar,
            'password' => bcrypt('12345678'),
            'bomon_id' => $request->bomon
        ]);

        $this->quyen_giangvien->create([
            'giangvien_id' => $request->giangvien_id,
            'quyen_id' => $request->quyen
        ]);

        return redirect()->route('giangvien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gv = $this->giangvien::find($id);
        $dsq = $this->dsquyen::all();
        $bm = $this->bomon::all();
        $qgv = $this->quyen_giangvien::where('giangvien_id', $gv->giangvien_id)->first();

        foreach($dsq as $d){
            if($d->quyen_id == $qgv->quyen_id){
                $this->htmlOptionQuyen .= '<option value="'.$d->quyen_id.'" selected>'.$d->tenquyen.'</option>';
            } else {
                $this->htmlOptionQuyen .= '<option value="'.$d->quyen_id.'">'.$d->tenquyen.'</option>';
            }
            // $this->htmlOptionQuyen .= '<option value="'.$d->quyen_id.'">'.$d->tenquyen.'</option>';
        }
        // Option bo mon
        foreach($bm as $b){
            if($b->bomon_id == $gv->bomon_id){
                $this->htmlOptionBoMon .= '<option value="'.$b->bomon_id.'" selected>'.$b->tenbomon.'</option>';
            } else {
                $this->htmlOptionBoMon .= '<option value="'.$b->bomon_id.'">'.$b->tenbomon.'</option>';
            }
            // $this->htmlOptionBoMon .= '<option value="'.$b->bomon_id.'">'.$b->tenbomon.'</option>';
        }

        return view('giangvien.edit', [
            'gv' => $gv,
            'htmlOptionQuyen' => $this->htmlOptionQuyen,
            'htmlOptionBoMon' => $this->htmlOptionBoMon
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
        $gv = $this->giangvien::find($id);

        $this->giangvien::find($id)->update([
            'name' => $request->tengiangvien,
            'email' => $request->email,
            'connho' => $request->connho,
            'ngaysinh' => $request->ngaysinh,
            'diachi' => $request->diachi,
            'sodienthoai' => $request->sdt,
            'avatar' => $request->avatar,
            'bomon_id' => $request->bomon
        ]);

        $this->quyen_giangvien::where('giangvien_id', $gv->giangvien_id)->update([
            'quyen_id' => $request->quyen
        ]);

        return redirect()->route('giangvien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $gv = $this->giangvien::find($id);
        $this->giangvien::find($id)->delete();
        $this->quyen_giangvien::where('giangvien_id', $gv->giangvien_id)->delete();

        return redirect()->route('giangvien.index');
    }
}
