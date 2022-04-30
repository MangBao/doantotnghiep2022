<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaThi;
use App\Models\MonHoc;
use App\Models\PhongThi;
use App\Models\BuoiThi;

class BuoiThiController extends Controller
{
    private $cathi;
    private $buoithi;
    private $monhoc;
    private $phongthi;
    private $htmlOptionCaThi;
    private $htmlOptionMonThi;
    private $htmlOptionPhongThi;

    public function __construct(CaThi $cathi, BuoiThi $buoithi, MonHoc $monhoc, PhongThi $phongthi) {
        $this->cathi = $cathi;
        $this->buoithi = $buoithi;
        $this->monhoc = $monhoc;
        $this->phongthi = $phongthi;
        $this->htmlOptionCaThi = '';
        $this->htmlOptionMonThi = '';
        $this->htmlOptionPhongThi = '';
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bts = $this->buoithi->orderBy('ngaythi', 'asc')->paginate(8);
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

        return view('buoithi.index',[
            'bts' => $bts,
            'i' => $i,
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

        // Option ca thi
        foreach($cts as $ct){
            $this->htmlOptionCaThi .= '<option value="'.$ct->cathi_id.'">'.$ct->cathi_id.' : '.$ct->giobatdau.' - '.$ct->gioketthuc.'</option>';
        }
        // Option mon thi
        foreach($mhs as $mh){
            foreach($bts as $bt){
                if($bt->monthi_id != $mh->monhoc_id){
                    $this->htmlOptionMonThi .= '<option value="'.$mh->monhoc_id.'">'.$mh->tenmonhoc.'</option>';
                    break;
                }
            }
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

        foreach($buoithi as $bt){
            if ($request->phongthi_id == $bt->phongthi_id && $request->ngaythi == $bt->ngaythi && $request->cathi_id == $bt->cathi_id){
                return redirect()->route('buoithi.create')->with('error', 'Buổi thi bị trùng !');
                break;
            } else {
                $this->buoithi::create([
                    'cathi_id' => $request->cathi_id,
                    'monthi_id' => $request->monthi_id,
                    'phongthi_id' => $request->phongthi_id,
                    'ngaythi' => $request->ngaythi,
                ]);
                return redirect()->route('buoithi.index')->with('success', 'Thêm thành công !');
            }
        }

        // return redirect()->route('buoithi.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bt = $this->buoithi::find($id);
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
        $bt = $this->buoithi::find($id)->update([
            'cathi_id' => $request->cathi_id,
            'monthi_id' => $request->monthi_id,
            'phongthi_id' => $request->phongthi_id,
            'ngaythi' => $request->ngaythi,
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
        $buoithi = $this->buoithi::find($id);
        $buoithi->delete();

        return redirect()->route('buoithi.index')->with('success', 'Xóa thành công !');
    }
}
