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
use App\Models\User;

class LichCoiThiController extends Controller
{
    private $lichcoithiDB;
    private $buoithiDB;
    private $user;
    private $bomon;

    public function __construct(LichCoiThi $lichcoithiDB, BuoiThi $buoithiDB, User $user, BoMon $bomon) {
        $this->lichcoithiDB = $lichcoithiDB;
        $this->buoithiDB = $buoithiDB;
        $this->user = $user;
        $this->bomon = $bomon;
        $this->middleware('auth');
        $this->middleware('permission');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $lichcoithi = $this->lichcoithiDB->join('bomon', 'lichcoithi.bomon_id', '=', 'bomon.bomon_id')
            ->orderBy('id', 'asc')
            ->paginate(8);

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

        // khoi tao bien bo mon id, gan bo mon id cho lich thi
        $this->khoiTaoBomonID($lichthis, $monhocs);

        // khoi tao bien giang vien id
        $this->khoiTaoGV($lichthis);

        // khoi tao bien mang lich coi thi, ti le xep cho giang vien
        $this->khoiTaoTiLeXep($giangviens);

        usort($giangviens, [LichCoiThiController::class, "cmpTiLeXep"]);

        $countLichGV = 0;

        // Duyệt từng lịch thi giang vien coi thi 1
        $this->lichThiGV1($lichthis, $giangviens, $countLichGV);

        // Duyệt từng lịch thi giang vien coi thi 2
        usort($giangviens, [LichCoiThiController::class, "cmp"]);

        $this->lichThiGV2($lichthis, $giangviens, $countLichGV);

        $i = 1;
        return view('lichcoithi.lichcoithiauto', [
            'lichthis' => $this->paginate($lichthis),
            'lt_not_panigate' => $lichthis,
            'i' => $i
        ]);

    }

    public function paginate($items, $perPage = 8, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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
            $lichthis[$i]->giangvien_id1 = '';
            $lichthis[$i]->tengiangvien1 = '';
            $lichthis[$i]->giangvien_id2 = '';
            $lichthis[$i]->tengiangvien2 = '';
        }
        return $lichthis;
    }

    protected function lichThiGV1($lichthis, $giangviens, $countLichGV = 0) {

        do {
            for ($i=0; $i < count($lichthis); $i++) {
                for ($j=0; $j < count($giangviens); $j++) {
                    if($lichthis[$i]->giangvien_id1 == '') {
                        if($lichthis[$i]->bomon_id == $giangviens[$j]->bomon_id && count($giangviens[$j]->lichcoithi) == 0 ) {
                            $lichthis[$i]->giangvien_id1 = $giangviens[$j]->giangvien_id;
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
                                    $lichthis[$i]->giangvien_id1 = $giangviens[$j]->giangvien_id;
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

    protected function lichThiGV2($lichthis, $giangviens, $countLichGV = 0) {
        do {
            for ($i=0; $i < count($lichthis); $i++) {
                for ($j=0; $j < count($giangviens); $j++) {
                    if($lichthis[$i]->giangvien_id2 == '') {

                        if(count($giangviens[$j]->lichcoithi) <= ($countLichGV - 1) ) {
                            $checkTrungLich = $this->checkTrungLich($giangviens[$j]->lichcoithi, $lichthis[$i]->ngaythi, $lichthis[$i]->cathi_id);
                            if(!$checkTrungLich) {
                                $lichthis[$i]->giangvien_id2 = $giangviens[$j]->giangvien_id;
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
            if($lich->giangvien_id2 == '') {
                return true;
            }
        }
        return false;
    }

    public function checkLichThiGV1($lichthi)
    {
        foreach ($lichthi as $lich) {
            if($lich->giangvien_id1 == '') {
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
            ->where('giangvien_id1', Auth::user()->giangvien_id)
            ->orWhere('giangvien_id2', Auth::user()->giangvien_id)
            ->orderBy('ngaythi', 'asc')->paginate(4);

        $i = 1;

        return view('lichcoithi.cuatoi', [
            'lichcoithi' => $lichcoithi,
            'i' => $i
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
        $data = $request->all();
        for($i=0; $i < count($data['id']); $i++) {
            $lichthi = new LichCoiThi();
            $lichthi->cathi_id = $data['cathi_id'][$i];
            $lichthi->giobatdau = $data['giobatdau'][$i];
            $lichthi->gioketthuc = $data['gioketthuc'][$i];
            $lichthi->ngaythi = $data['ngaythi'][$i];
            $lichthi->giangvien_id1 = $data['giangvien_id1'][$i];
            $lichthi->tengiangvien1 = $data['tengiangvien1'][$i];
            $lichthi->giangvien_id2 = $data['giangvien_id2'][$i];
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
