<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaThi;
use App\Models\MonHoc;
use App\Models\PhongThi;
use App\Models\CaThi_BuoiThi;
use App\Models\PhongThi_BuoiThi;
use App\Models\MonThi_BuoiThi;
use App\Models\BuoiThi;
use App\Models\GiangVien;

class BuoiThiController extends Controller
{
    private $giangvien;
    private $cathi;
    private $buoithi;
    private $monhoc;
    private $phongthi;
    private $cathi_buoithi;
    private $phongthi_buoithi;
    private $monthi_buoithi;
    private $htmlOptionCaThi;
    private $htmlOptionMonThi;
    private $htmlOptionPhongThi;
    private $htmlOptionCanBoGiangDay;

    public function __construct(CaThi $cathi, BuoiThi $buoithi, MonHoc $monhoc, PhongThi $phongthi, CaThi_BuoiThi $cathi_buoithi, PhongThi_BuoiThi $phongthi_buoithi, MonThi_BuoiThi $monthi_buoithi, GiangVien $giangvien) {
        $this->cathi = $cathi;
        $this->buoithi = $buoithi;
        $this->monhoc = $monhoc;
        $this->phongthi = $phongthi;
        $this->cathi_buoithi = $cathi_buoithi;
        $this->phongthi_buoithi = $phongthi_buoithi;
        $this->monthi_buoithi = $monthi_buoithi;
        $this->giangvien = $giangvien;
        $this->htmlOptionCaThi = '';
        $this->htmlOptionMonThi = '';
        $this->htmlOptionPhongThi = '';
        $this->htmlOptionCanBoGiangDay = '';
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('sinhvien');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->param){
            $bts = $this->buoithi->join('cathi_buoithi as cb', 'buoithi.id', '=', 'cb.buoithi_id')
                ->join('phongthi_buoithi as pb', 'buoithi.id', '=', 'pb.buoithi_id')
                ->join('monthi_buoithi as mb', 'buoithi.id', '=', 'mb.buoithi_id')
                ->join('cathi as c', 'cb.cathi_id', '=', 'c.cathi_id')
                ->join('phongthi as p', 'pb.phongthi_id', '=', 'p.phongthi_id')
                ->join('monhoc as m', 'mb.monthi_id', '=', 'm.monhoc_id')
                ->join('users as u', 'buoithi.canbogiangday', '=', 'u.id')
                ->where('p.tenphongthi', 'like', '%' . $request->param . '%')
                ->orWhere('m.tenmonhoc', 'like', '%' . $request->param . '%')
                ->orWhere('c.cathi_id', 'like', '%' . $request->param . '%')
                ->orWhere('u.name', 'like', '%' . $request->param . '%')
                ->orWhere('hinhthucthi', 'like', '%' . $request->param . '%')
                ->orWhere('ngaythi', 'like', '%' . $request->param . '%')
                ->orderBy('ngaythi', 'asc')->paginate(250);
        }
        else {
            $bts = $this->buoithi->join('cathi_buoithi as cb', 'buoithi.id', '=', 'cb.buoithi_id')
                ->join('phongthi_buoithi as pb', 'buoithi.id', '=', 'pb.buoithi_id')
                ->join('monthi_buoithi as mb', 'buoithi.id', '=', 'mb.buoithi_id')
                ->join('users as u', 'buoithi.canbogiangday', '=', 'u.id')
                ->orderBy('ngaythi', 'asc')->paginate(8);
        }

        $cts = $this->cathi::all();
        $mhs = $this->monhoc::all();
        $i = 1;

        foreach($bts as $bt){
            foreach($cts as $ct){
                if($bt->cathi_id == $ct->cathi_id){
                    $bt->giobatdau = $ct->giobatdau;
                    $bt->gioketthuc = $ct->gioketthuc;
                }
            }
            foreach($mhs as $mh){
                if($bt->monthi_id == $mh->monhoc_id){
                    $bt->tenmonthi = $mh->tenmonhoc;
                }
            }
        }
        // dd($bts);

        if(count($bts) > 0){
            return view('buoithi.index',[
                'bts' => $bts,
                'i' => $i,
            ]);
        }

        return view('buoithi.index',[
            'bts' => $bts,
            'notification' => 'Không có dữ liệu',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bts = $this->buoithi::all();
        $cts = $this->cathi::all();
        $mhs = $this->monhoc::all();
        $pts = $this->phongthi::all();
        $cbs = $this->giangvien::where('role_id', '!=', 4)->get();

        // Option Can Bo Giang Day
        foreach($cbs as $cb){
            $this->htmlOptionCanBoGiangDay .= '<option value="'. $cb->id .'">'. $cb->name .'</option>';
        }

        // Option ca thi
        foreach($cts as $ct){
            $this->htmlOptionCaThi .= '<option value="'.$ct->cathi_id.'">'.$ct->cathi_id.' : '.$ct->giobatdau.' - '.$ct->gioketthuc.'</option>';
        }
        // Option mon thi
        foreach($mhs as $mh){
            // if(!is_null($bts)){
            //     foreach($bts as $bt){
            //         if($bt->monthi_id != $mh->monhoc_id){
            //             $this->htmlOptionMonThi .= '<option value="'.$mh->monhoc_id.'">'.$mh->tenmonhoc.'</option>';
            //             break;
            //         }
            //     }
            // }
            $this->htmlOptionMonThi .= '<option value="'.$mh->monhoc_id.'">'.$mh->tenmonhoc.'</option>';
        }
        // Option phong thi
        foreach($pts as $pt){
            $this->htmlOptionPhongThi .= '<option value="'.$pt->phongthi_id.'">'.$pt->tenphongthi.' - '.$pt->giangduong_id.'</option>';
        }
        // foreach($bts as $bt){
        //     $this->htmlOptionPhongThi .= '<option value="'.$bt->phongthi_id.'">'.$bt->tenphongthi.' - '.$bt->giangduong_id.'</option>';
        // }

        return view('buoithi.create', [
            'htmlOptionCaThi' => $this->htmlOptionCaThi,
            'htmlOptionMonThi' => $this->htmlOptionMonThi,
            'htmlOptionPhongThi' => $this->htmlOptionPhongThi,
            'htmlOptionCanBoGiangDay' => $this->htmlOptionCanBoGiangDay,
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
        $cts = $this->cathi::all();
        $pts = $this->phongthi::all();
        $buoithi = $this->buoithi::all();
        $ct_bt = $this->cathi_buoithi::all();
        $pt_bt = $this->phongthi_buoithi::all();
        $mh_bt = $this->monthi_buoithi::all();
        $buoithiDB = $this->buoithi->join('cathi_buoithi as cb', 'buoithi.id', '=', 'cb.buoithi_id')
                    ->join('phongthi_buoithi as pb', 'buoithi.id', '=', 'pb.buoithi_id')
                    ->join('monthi_buoithi as mb', 'buoithi.id', '=', 'mb.buoithi_id')
                    ->select('buoithi.*','cb.cathi_id','pb.phongthi_id','mb.monthi_id')
                    ->get();

        if(!is_null($buoithiDB)){
            foreach($buoithiDB as $bt){
                if ($request->phongthi_id == $bt->phongthi_id && $request->ngaythi == $bt->ngaythi && $request->cathi_id == $bt->cathi_id){
                    return redirect()->route('buoithi.create')->with('error', 'Buổi thi bị trùng !');
                    break;
                }
            }
        }

        $this->buoithi::create([
            'ngaythi' => $request->ngaythi,
            'hinhthucthi' => $request->hinhthucthi,
            'canbogiangday' => $request->canbogiangday,
        ]);
        $this->cathi_buoithi::create([
            'buoithi_id' => $this->buoithi::all()->last()->id,
            'cathi_id' => $request->cathi_id,
        ]);
        $this->phongthi_buoithi::create([
            'buoithi_id' => $this->buoithi::all()->last()->id,
            'phongthi_id' => $request->phongthi_id,
        ]);
        $this->monthi_buoithi::create([
            'buoithi_id' => $this->buoithi::all()->last()->id,
            'monthi_id' => $request->monthi_id,
        ]);

        return redirect()->route('buoithi.index')->with('success', 'Thêm thành công !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bt = $this->buoithi->join('cathi_buoithi as cb', 'buoithi.id', '=', 'cb.buoithi_id')
                ->join('phongthi_buoithi as pb', 'buoithi.id', '=', 'pb.buoithi_id')
                ->join('monthi_buoithi as mb', 'buoithi.id', '=', 'mb.buoithi_id')
                ->where('buoithi.id', $id)->first();
        $cts = $this->cathi::all();
        $mhs = $this->monhoc::all();
        $pts = $this->phongthi::all();

        // Option ca thi
        foreach($cts as $ct){
            if($bt->cathi_id == $ct->cathi_id){
                $this->htmlOptionCaThi .= '<option value="'.$ct->cathi_id.'" selected>'.$ct->cathi_id.' : '.$ct->giobatdau.' - '.$ct->gioketthuc.'</option>';
            } else {
                $this->htmlOptionCaThi .= '<option value="'.$ct->cathi_id.'">'.$ct->cathi_id.' : '.$ct->giobatdau.' - '.$ct->gioketthuc.'</option>';
            }
        }
        // Option mon thi
        foreach($mhs as $mh){
            if($bt->monthi_id == $mh->monhoc_id){
                $this->htmlOptionMonThi .= '<option value="'.$mh->monhoc_id.'" selected>'.$mh->tenmonhoc.'</option>';
            } else {
                $this->htmlOptionMonThi .= '<option value="'.$mh->monhoc_id.'">'.$mh->tenmonhoc.'</option>';
            }
        }
        // Option phong thi
        foreach($pts as $pt){
            if($bt->phongthi_id == $pt->phongthi_id){
                $this->htmlOptionPhongThi .= '<option value="'.$pt->phongthi_id.'" selected>'.$pt->tenphongthi.' - '.$pt->giangduong_id.'</option>';
            } else {
                $this->htmlOptionPhongThi .= '<option value="'.$pt->phongthi_id.'">'.$pt->tenphongthi.' - '.$pt->giangduong_id.'</option>';
            }
        }

        return view('buoithi.edit',[
            'bt' => $bt,
            'htmlOptionCaThi' => $this->htmlOptionCaThi,
            'htmlOptionMonThi' => $this->htmlOptionMonThi,
            'htmlOptionPhongThi' => $this->htmlOptionPhongThi,
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

        $this->buoithi::find($id)->update([
            'ngaythi' => $request->ngaythi,
        ]);
        $this->cathi_buoithi::where('buoithi_id', $id)->update([
            'cathi_id' => $request->cathi_id,
        ]);
        $this->phongthi_buoithi::where('buoithi_id', $id)->update([
            'phongthi_id' => $request->phongthi_id,
        ]);
        $this->monthi_buoithi::where('buoithi_id', $id)->update([
            'monthi_id' => $request->monthi_id,
        ]);

        return redirect()->route('buoithi.index')->with('success', 'Sửa thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->buoithi::find($id)->delete();

        return redirect()->route('buoithi.index')->with('success', 'Xóa thành công !');
    }
}
