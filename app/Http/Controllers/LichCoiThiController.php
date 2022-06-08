<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\BuoiThi;
use App\Models\CaThi;
use App\Models\MonHoc;
use App\Models\BoMon;
use App\Models\GiangVien;
use App\Models\LichCoiThi;
use Illuminate\Support\Facades\Auth;
use App\Exports\LichCoiThiExport;
use App\Exports\LichCoiThiExportCaNhan;
use Maatwebsite\Excel\Facades\Excel;

class LichCoiThiController extends Controller
{
    private $lichcoithiDB;
    private $buoithiDB;
    private $giangvien;
    private $bomon;
    private $htmlOptionGiangVien1;
    private $htmlOptionGiangVien2;

    public function __construct(LichCoiThi $lichcoithiDB, BuoiThi $buoithiDB, GiangVien $giangvien, BoMon $bomon) {
        $this->lichcoithiDB = $lichcoithiDB;
        $this->buoithiDB = $buoithiDB;
        $this->giangvien = $giangvien;
        $this->bomon = $bomon;
        $this->htmlOptionGiangVien1 = '';
        $this->htmlOptionGiangVien2 = '';
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('sinhvien');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if($request->param) {
            $lichcoithi = $this->lichcoithiDB->join('users', 'users.id', '=', 'lichcoithi.canbogiangday')
                                ->where('tenmonthi', 'like', '%' . $request->param . '%')
                                ->orWhere('tengiangvien1', 'like', '%' . $request->param . '%')
                                ->orWhere('tengiangvien2', 'like', '%' . $request->param . '%')
                                ->orWhere('users.name', 'like', '%' . $request->param . '%')
                                ->orWhere('phongthi_id', 'like', '%' . $request->param . '%')
                                ->orWhere('hinhthucthi', 'like', '%' . $request->param . '%')
                                ->orderBy('lichcoithi.id', 'asc')
                                ->paginate(250);
        } else {
            $lichcoithi = $this->lichcoithiDB->join('bomon', 'lichcoithi.bomon_id', '=', 'bomon.bomon_id')
                                ->join('users', 'users.id', '=', 'lichcoithi.canbogiangday')
                                ->orderBy('lichcoithi.id', 'asc')
                                ->paginate(8);
        }

        $i = 1;
        if(count($lichcoithi) > 0){
            return view('lichcoithi.index', ['lichcoithi' => $lichcoithi, 'i' => $i]);
        }
        return view('lichcoithi.index', ['lichcoithi' => $lichcoithi, 'notification' => 'Không có dữ liệu']);
    }

    public function lichcoithiauto()
    {
        $lichthis = LichCoiThi::getLichThi();
        $giangviens = LichCoiThi::getGiangVien();
        $monhocs = LichCoiThi::getMonHoc();

        // echo $lichthis;
        if(count($giangviens) < 4) {
            return redirect()->route('lichcoithi.index')->with('error', 'Cần có ít nhất 4 giảng viên để xếp lịch coi thi');
        }
        if(!is_null($lichthis)){
            // khoi tao bien bo mon id, gan bo mon id cho lich thi
            $this->khoiTaoBomonID($lichthis, $monhocs);

            // khoi tao bien can bo giang day
            $this->khoiTaoCBGD($lichthis, $giangviens);

            // khoi tao bien giang vien id
            $this->khoiTaoGV($lichthis);

            // khoi tao bien mang lich coi thi, ti le xep cho giang vien
            $this->khoiTaoTiLeXep($giangviens);

            // xắp sếp theo tỷ lệ xếp
            usort($giangviens, [LichCoiThiController::class, "cmpTiLeXep"]);

            $countLichGV = 0;

            // Duyệt từng lịch thi giang vien coi thi 1
            $this->lichThiGV1($lichthis, $giangviens, $countLichGV);

            // xắp sếp giang viên từ trên xuống dưới
            usort($giangviens, [LichCoiThiController::class, "cmp"]);

            $this->lichThiGV2($lichthis, $giangviens, $countLichGV);

            $i = 1;
            return view('lichcoithi.lichcoithiauto', [
                'lichthis' => $lichthis,
                'lt_not_panigate' => $lichthis,
                'i' => $i
            ]);
        }
        else {
            return view('lichcoithi.lichcoithiauto', [
                'notification' => 'Không có dữ liệu',
                'lt_not_panigate' => $lichthis,
                'lichthis' => $lichthis,
            ]);
        }

    }

    static function cmpTiLeXep($a, $b)
    {
        if ($a->tilexep == $b->tilexep) {
            return 0;
        }
        return ($a->tilexep > $b->tilexep) ? -1 : 1;
    }

    static function cmp($a, $b)
    {
        if ($a->tilexep == $b->tilexep && count($a->lichcoithi) == count($b->lichcoithi)) {
            return 0;
        }
        return (count($a->lichcoithi) > count($b->lichcoithi) || $a->tilexep > $b->tilexep) ? -1 : 1;
    }

    protected function khoiTaoTiLeXep($giangviens){
        for ($j=0; $j < count($giangviens); $j++) {
            $giangviens[$j]->lichcoithi = [];
            if ($giangviens[$j]->connho == 1) {
                $giangviens[$j]->tilexep = 75;
            } else {
                $giangviens[$j]->tilexep = 100;
            }
        }
        return $giangviens;
    }

    protected function khoiTaoBomonID($lichthis, $monhocs) {
        foreach ($lichthis as $lichthi) {
            $lichthi->bomon_id = '';
        }

        foreach ($lichthis as $lichthi) {
            foreach ($monhocs as $monhoc) {
                if ($lichthi->monthi_id == $monhoc->monhoc_id) {
                    $lichthi->bomon_id = $monhoc->bomon_id;
                    break;
                }
            }
        }

        return $lichthis;
    }

    protected function khoiTaoGV($lichthis) {
        for ($i=0; $i < count($lichthis); $i++) {
            $lichthis[$i]->user_id1 = '';
            $lichthis[$i]->tengiangvien1 = '';
            $lichthis[$i]->user_id2 = '';
            $lichthis[$i]->tengiangvien2 = '';
        }
        return $lichthis;
    }

    protected function khoiTaoCBGD($lichthis, $giangviens) {
        for ($i=0; $i < count($lichthis); $i++) {
            $lichthis[$i]->ten_canbogd = '';
            for ($j=0; $j < count($giangviens); $j++) {
                if ($lichthis[$i]->canbogiangday == $giangviens[$j]->id) {
                    $lichthis[$i]->ten_canbogd = $giangviens[$j]->name;
                    break;
                }
            }
        }
        return $lichthis;
    }

    protected function lichThiGV1($lichthis, $giangviens, $countLichGV = 0) {

        do {
            for ($i=0; $i < count($lichthis); $i++) {
                for ($j=0; $j < count($giangviens); $j++) {
                    if($lichthis[$i]->user_id1 == '') {
                        if($lichthis[$i]->canbogiangday == $giangviens[$j]->id && count($giangviens[$j]->lichcoithi) == 0 ) {
                            $lichthis[$i]->user_id1 = $giangviens[$j]->user_id;
                            $lichthis[$i]->tengiangvien1 = $giangviens[$j]->name;
                            array_push($giangviens[$j]->lichcoithi, (object)[
                                'ngaythi' => $lichthis[$i]->ngaythi,
                                'cathi_id' => $lichthis[$i]->cathi_id
                            ]);
                            break;
                        }
                        else {
                            if(count($giangviens[$j]->lichcoithi) <= $countLichGV ) {
                                $checkTrungLich = $this->checkTrungLich($giangviens[$j]->lichcoithi, $lichthis[$i]->ngaythi, $lichthis[$i]->cathi_id);
                                if(!$checkTrungLich) {
                                    $lichthis[$i]->user_id1 = $giangviens[$j]->user_id;
                                    $lichthis[$i]->tengiangvien1 = $giangviens[$j]->name;
                                    array_push($giangviens[$j]->lichcoithi, (object)[
                                        'ngaythi' => $lichthis[$i]->ngaythi,
                                        'cathi_id' => $lichthis[$i]->cathi_id
                                    ]);
                                    break;
                                }
                            }
                        }
                    }
                }
            }
            $countLichGV++;
        } while ($this->checkLichThiGV1($lichthis));

        return $lichthis;
    }

    protected function lichThiGV2($lichthis, $giangviens, $countLichGV) {
        do {
            for ($i=0; $i < count($lichthis); $i++) {
                for ($j=0; $j < count($giangviens); $j++) {
                    if($lichthis[$i]->user_id2 == '') {

                        if(count($giangviens[$j]->lichcoithi) <= ($countLichGV - 1) ) {
                            $checkTrungLich = $this->checkTrungLich($giangviens[$j]->lichcoithi, $lichthis[$i]->ngaythi, $lichthis[$i]->cathi_id);
                            if(!$checkTrungLich) {
                                $lichthis[$i]->user_id2 = $giangviens[$j]->user_id;
                                $lichthis[$i]->tengiangvien2 = $giangviens[$j]->name;
                                array_push($giangviens[$j]->lichcoithi, (object)[
                                    'ngaythi' => $lichthis[$i]->ngaythi,
                                    'cathi_id' => $lichthis[$i]->cathi_id
                                ]);
                                break;
                            }
                        }

                    }
                }
            }
            $countLichGV++;

        } while ($this->checkLichThiGV2($lichthis));

        return $lichthis;
    }

    protected function checkTrungLich($lichthis, $ngaythi, $cathi_id) {
        for ($i=0; $i < count($lichthis); $i++) {
            if($lichthis[$i]->ngaythi == $ngaythi && $lichthis[$i]->cathi_id == $cathi_id) {
                return true;
            }
        }
        return false;
    }

    protected function checkLichThiGV2($lichthi)
    {
        foreach ($lichthi as $lich) {
            if($lich->user_id2 == '') {
                return true;
            }
        }
        return false;
    }

    public function checkLichThiGV1($lichthi)
    {
        foreach ($lichthi as $lich) {
            if($lich->user_id1 == '') {
                return true;
            }
        }
        return false;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cuatoi()
    {
        $lichcoithi = $this->lichcoithiDB
            ->where('user_id1', Auth::user()->user_id)
            ->orWhere('user_id2', Auth::user()->user_id)
            ->orderBy('ngaythi', 'asc')->paginate(4);

        $giangvien = $this->giangvien->find(Auth::user()->id);
        $i = 1;

        return view('lichcoithi.cuatoi', [
            'lichcoithi' => $lichcoithi,
            'giangvien' => $giangvien,
            'i' => $i
        ]);
    }

    public function updatethongbao(Request $request)
    {

        if($request->thongbaomail == 0) {
            $this->giangvien->find(Auth::user()->id)->update([
                'thongbaomail' => $request->thongbaomail
            ]);
            return redirect()->route('lichcoithi.cuatoi')->with('success', 'Tắt thông báo thành công');
            dd($this->user->find(Auth::id()));
        }
        else {
            $this->giangvien->find(Auth::user()->id)->update([
                'thongbaomail' => $request->thongbaomail
            ]);
            return redirect()->route('lichcoithi.cuatoi')->with('success', 'Bật thông báo thành công');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        for($i=0; $i < count($data['id']); $i++) {
            $lichthi = new LichCoiThi();
            $lichthi->cathi_id = $data['cathi_id'][$i];
            $lichthi->giobatdau = $data['giobatdau'][$i];
            $lichthi->gioketthuc = $data['gioketthuc'][$i];
            $lichthi->ngaythi = $data['ngaythi'][$i];
            $lichthi->canbogiangday = $data['canbogiangday'][$i];
            $lichthi->hinhthucthi = $data['hinhthucthi'][$i];
            $lichthi->user_id1 = $data['user_id1'][$i];
            $lichthi->tengiangvien1 = $data['tengiangvien1'][$i];
            $lichthi->user_id2 = $data['user_id2'][$i];
            $lichthi->tengiangvien2 = $data['tengiangvien2'][$i];
            $lichthi->tenmonthi = $data['tenmonthi'][$i];
            $lichthi->phongthi_id = $data['phongthi_id'][$i];
            $lichthi->bomon_id = $data['bomon_id'][$i];

            $lichthi->save();

            $this->buoithiDB::find($data['id'][$i])->delete();
        }

        return redirect()->route('lichcoithi.index')->with('success', 'Thêm vào database thành công');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lichthi = $this->lichcoithiDB->find($id);
        $giangvien = $this->giangvien::all();

        foreach ($giangvien as $gv) {
            if($gv->user_id == $lichthi->user_id1) {
                $this->htmlOptionGiangVien1 .= '<option value="'.$gv->user_id.'" selected>'.$gv->name.'</option>';
            }
            else{
                $this->htmlOptionGiangVien1 .= '<option value="'.$gv->user_id.'" >'.$gv->name.'</option>';
            }

        }
        foreach ($giangvien as $gv) {
            if($gv->user_id == $lichthi->user_id2) {
                $this->htmlOptionGiangVien2 .= '<option value="'.$gv->user_id.'" selected>'.$gv->name.'</option>';
            }
            else {
                $this->htmlOptionGiangVien2 .= '<option value="'.$gv->user_id.'" >'.$gv->name.'</option>';
            }
        }

        return view('lichcoithi.edit', [
            'lct' => $lichthi,
            'htmlOptionGiangVien1' => $this->htmlOptionGiangVien1,
            'htmlOptionGiangVien2' => $this->htmlOptionGiangVien2
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
        $this->lichcoithiDB->find($id)->update([
            'user_id1' => $request->user_id1,
            'tengiangvien1' => $request->tengiangvien1,
            'user_id2' => $request->user_id2,
            'tengiangvien2' => $request->tengiangvien2,
        ]);

        return redirect()->route('lichcoithi.index')->with('success', 'Cập nhật thành công');
    }

    public function xinvang($id)
    {
        $lich = $this->lichcoithiDB->find($id);

        // dd($lich);
        return view('lichcoithi.xinvang', [
            'lich' => $lich
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(!is_null($id)) {
            $this->lichcoithiDB->find($id)->delete();
            return redirect()->route('lichcoithi.index')->with('success', 'Xóa thành công');
        }
        return redirect()->route('lichcoithi.index')->with('error', 'ID / Lịch thi không tồn tại !');
    }

    public function exportcanhan()
    {
        return Excel::download(new LichCoiThiExportCaNhan, 'lichcoithi_cuatoi.xlsx');
    }

    public function export()
    {
        return Excel::download(new LichCoiThiExport, 'lichcoithi.xlsx');
    }
}
