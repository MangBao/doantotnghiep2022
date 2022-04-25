<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongThi_Ca;
use App\Models\CaThi;
use App\Models\MonHoc;
use App\Models\BoMon;
use App\Models\GiangVien;
use App\Models\LichCoiThi;

class LichCoiThiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lichthis = LichCoiThi::getLichThi();
        $giangviens = LichCoiThi::getGiangVien();
        $monhocs = LichCoiThi::getMonHoc();

        // khoi tao bien bo mon id
        foreach ($lichthis as $lichthi) {
            $lichthi->bomon_id = '';
            // $giangviens[$j]->flag = 0;
        }

        // khoi tao bien giang vien id
        for ($i=0; $i < count($lichthis); $i++) {
            $lichthis[$i]->giangvien_id1 = '';
            $lichthis[$i]->tengiangvien1 = '';
            $lichthis[$i]->giangvien_id2 = '';
            $lichthis[$i]->tengiangvien2 = '';
        }

        // gan bo mon id cho lich thi
        foreach ($lichthis as $lichthi) {
            foreach ($monhocs as $monhoc) {
                if ($lichthi->monthi_id == $monhoc->monhoc_id) {
                    $lichthi->bomon_id = $monhoc->bomon_id;
                    break;
                }
            }
            // $lichthi->bomon_id = ;
        }
        // $flag = 0;
        // khoi tao bien mang lich coi thi, ti le xep cho giang vien
        for ($j=0; $j < count($giangviens); $j++) {
            $giangviens[$j]->lichcoithi = [];
            if ($giangviens[$j]->connho == 1) {
                $giangviens[$j]->tilexep = 75;
            } else {
                $giangviens[$j]->tilexep = 100;
            }
        }

        // usort($giangviens, [LichCoiThiController::class, "cmpTiLeXep"]);
        // for ($j=0; $j < count($giangviens); $j++) {
        //     echo $giangviens[$j]->name. ' ' .$giangviens[$j]->tilexep . ' - ' . count($giangviens[$j]->lichcoithi).'<br>';
        // }
        $countLichGV = 0;
        // Duyệt từng lịch thi giang vien coi thi 1
        // dd($giangviens);

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

        // Duyệt từng lịch thi giang vien coi thi 2

        // for($g)
        // usort($giangviens, [LichCoiThiController::class, "cmp"]);
        // for ($j=0; $j < count($giangviens); $j++) {
        //     echo $giangviens[$j]->name. ' ' .$giangviens[$j]->tilexep . ' - ' . count($giangviens[$j]->lichcoithi).'<br>';
        // }
        // dd($countLichGV);

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

        // echo '<pre>';
        // dd($lichthis[22]);
        // echo '</pre>';

        // for ($j=0; $j < count($giangviens); $j++) {
        //     echo $giangviens[$j]->name. ' ' .$giangviens[$j]->tilexep . ' - ' . count($giangviens[$j]->lichcoithi).'<br>';
        // }

        $i = 1;
        return view('lichcoithi.index', [
            'lichthis' => $lichthis,
            'giangvien' => $giangviens,
            'i' => $i
            // 'test' => $a

        ]);

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
        // dd($lichthi);
        foreach ($lichthi as $lich) {
            if($lich->giangvien_id2 == '') {
                return true;
            }
        }
        return false;
    }

    public function checkLichThiGV1($lichthi)
    {
        // dd($lichthi);
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
