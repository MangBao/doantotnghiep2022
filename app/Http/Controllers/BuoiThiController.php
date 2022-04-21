<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaThi;
use App\Models\MonThi;
use App\Models\PhongThi;
use App\Models\PhongThi_Ca;

class BuoiThiController extends Controller
{
    private $cathi;
    private $pt_ca;
    private $monthi;
    private $phongthi;
    private $htmlOptionCaThi;
    private $htmlOptionMonThi;
    private $htmlOptionPhongThi;

    public function __construct(CaThi $cathi, PhongThi_Ca $pt_ca, MonThi $monthi, PhongThi $phongthi) {
        $this->cathi = $cathi;
        $this->pt_ca = $pt_ca;
        $this->monthi = $monthi;
        $this->phongthi = $phongthi;
        $this->htmlOptionCaThi = '';
        $this->htmlOptionMonThi = '';
        $this->htmlOptionPhongThi = '';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bts = $this->pt_ca::latest()->paginate(10);
        $cts = $this->cathi::all();
        $mts = $this->monthi::all();
        $i = 1;

        foreach($bts as $bt){
            foreach($cts as $ct){
                if($bt->cathi_id == $ct->cathi_id){
                    $bt->giobatdau = $ct->giobatdau;
                    $bt->gioketthuc = $ct->gioketthuc;
                }
            }
            foreach($mts as $mt){
                if($bt->monthi_id == $mt->monthi_id){
                    $bt->tenmonthi = $mt->tenmonthi;
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
        $bts = $this->pt_ca::all();
        $cts = $this->cathi::all();
        $mts = $this->monthi::all();
        $pts = $this->phongthi::all();

        // Option ca thi
        foreach($cts as $ct){
            $this->htmlOptionCaThi .= '<option value="'.$ct->cathi_id.'">'.$ct->cathi_id.' : '.$ct->giobatdau.' - '.$ct->gioketthuc.'</option>';
        }
        // Option mon thi
        foreach($mts as $mt){
            foreach($bts as $bt){
                if($bt->monthi_id != $mt->monthi_id){
                    $this->htmlOptionMonThi .= '<option value="'.$mt->monthi_id.'">'.$mt->tenmonthi.'</option>';
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
        $pt_ca = $this->pt_ca::all();

        foreach($pt_ca as $ptc){
            if ($request->phongthi_id == $ptc->phongthi_id && $request->ngaythi == $ptc->ngaythi && $request->cathi_id == $ptc->cathi_id){
                return redirect()->route('buoithi.create')->with('error', 'Buổi thi bị trùng !');
                break;
            } else {
                $this->pt_ca::create([
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
    public function delete($id)
    {
        $pt_ca = $this->pt_ca::find($id);
        $pt_ca->delete();

        return redirect()->route('buoithi.index')->with('success', 'Xóa thành công !');
    }
}
