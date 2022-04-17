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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gvs = $this->giangvien::all();

        return view('giangvien.index',[
            'gvs' => $gvs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsq = $this->dsquyen::all();
        $gvs = $this->giangvien::all();
        $gvs = $this->giangvien::all();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
