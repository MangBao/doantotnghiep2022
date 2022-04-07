<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LichCoiThi;
use App\Models\GiangVien;

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
        $giangviens = GiangVien::getGiangVien();


        // $flag = 0;
        // Khởi tạo mảng lịch thi
        for ($j=0; $j < count($giangviens); $j++) {
            $giangviens[$j]->lichcoithi = [];
            // $giangviens[$j]->flag = 0;
        }

        // Duyệt từng lịch thi giang vien coi thi 1
        for ($i=0; $i < count($lichthis); $i++) {
            $lichthis[$i]->idgiangvien1 = '';
            $lichthis[$i]->tengiangvien1 = '';
            $lichthis[$i]->idgiangvien2 = '';
            $lichthis[$i]->tengiangvien2 = '';
            for ($j=0; $j < count($giangviens); $j++) {
                // $giangviens[$j]->lichcoithi = []; // Khởi tạo mảng lịch thi //empty($giangvien[$i]->lichcoithi)
                if($lichthis[$i]->idbomon == $giangviens[$j]->idbomon && count($giangviens[$j]->lichcoithi) == 0) {
                    $lichthis[$i]->idgiangvien1 = $giangviens[$j]->idgiangvien;
                    $lichthis[$i]->tengiangvien1 = $giangviens[$j]->tengiangvien;
                    array_push($giangviens[$j]->lichcoithi, (object)[
                        'ngaythi' => $lichthis[$i]->ngaythi,
                        'cathi' => $lichthis[$i]->idca
                    ]);
                    // $flag = 1;
                    break;
                }
            }
        }

        for ($j=0; $j < count($giangviens); $j++) {
            $giangviens[$j]->flag = 0;
        }

        // Duyệt từng lịch thi giang vien coi thi 2
        $flag = 1;
        $count = 1;

        for ($i=0; $i < count($lichthis); $i++) {
            for ($j=0; $j < count($giangviens); $j++) {
                // $giangviens[$j]->lichcoithi = [];
                // echo '<pre>';
                // print_r($giangviens[$j]);
                // var_dump($i);
                // echo '</pre>';
                if($lichthis[$i]->idgiangvien1 != $giangviens[$j]->idgiangvien && $giangviens[$j]->flag == 0) {
                    foreach ($giangviens[$j]->lichcoithi as $lich) {
                        if($lich->ngaythi == $lichthis[$i]->ngaythi && $lich->cathi == $lichthis[$i]->idca) {
                            // $flag = 0;
                            break;
                            // break;
                        }
                    }
                    // if($flag != 0){
                        $lichthis[$i]->idgiangvien2 = $giangviens[$j]->idgiangvien;
                        $lichthis[$i]->tengiangvien2 = $giangviens[$j]->tengiangvien;
                        array_push($giangviens[$j]->lichcoithi, (object)[
                            'ngaythi' => $lichthis[$i]->ngaythi,
                            'cathi' => $lichthis[$i]->idca,
                        ]);
                        // if(count($giangviens[$j]->lichcoithi) < 2) {
                        //     $giangviens[$j]->flag = 0;
                        // } else{
                            $giangviens[$j]->flag = 1;
                        // }

                        // $flag = 1;
                        // $j = 0;
                        echo '<pre>';
                        print_r($giangviens[$j]);
                        echo count($giangviens[$j]->lichcoithi);
                        echo '</pre>';
                        break;
                    // }
                }
            }
            $count++;
        }

        // for ($i=0; $i < 18; $i++) {

        //         // if($lichthis[$i]->idgiangvien1 == null) {
        //         //     // echo $giangviens[$i]->idbomon.'<br>';
        //         //     $lichthis[$i]->idgiangvien1 = $giangviens[rand(0, count($giangviens) - 1 )]->idgiangvien;
        //             $lichthis[$i]->tengiangvien1 = $giangviens[$j]->tengiangvien;
        //         // }

        // }


        return view('front-end.lichcoithi', [
            'lichthi' => $lichthis,
            'giangvien' => $giangviens
            // 'test' => $a
        ]);
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
