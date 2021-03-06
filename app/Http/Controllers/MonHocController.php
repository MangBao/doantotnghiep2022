<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BoMon;
use App\Models\MonHoc;
use App\Models\Khoa;
use App\Models\User;
use App\Models\BuoiThi;
use App\Models\PhongThi_BuoiThi;
use App\Models\MonThi_BuoiThi;
use App\Models\CaThi_BuoiThi;

class MonHocController extends Controller
{
    private $bomon;
    private $monhoc;
    private $khoa;
    private $user;
    private $buoithi;
    private $phongthi_buoithi;
    private $monthi_buoithi;
    private $cathi_buoithi;
    private $htmlOptionBoMon;

    public function __construct(MonHoc $monhoc, BoMon $bomon, Khoa $khoa, User $user, BuoiThi $buoithi, PhongThi_BuoiThi $phongthi_buoithi, MonThi_BuoiThi $monthi_buoithi, CaThi_BuoiThi $cathi_buoithi) {
        $this->monhoc = $monhoc;
        $this->bomon = $bomon;
        $this->khoa = $khoa;
        $this->user = $user;
        $this->buoithi = $buoithi;
        $this->phongthi_buoithi = $phongthi_buoithi;
        $this->monthi_buoithi = $monthi_buoithi;
        $this->cathi_buoithi = $cathi_buoithi;
        $this->htmlOptionBoMon = '';
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('khoa');
        $this->middleware('sinhvien');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bms = $this->bomon::all();

        $user = $this->user->join('bomon', 'users.bomon_id', '=', 'bomon.bomon_id')
            ->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
            ->select('users.*', 'bomon.tenbomon', 'khoa.khoa_id', 'khoa.tenkhoa')
            ->where('users.user_id', '=', Auth::user()->user_id)
            ->get();

        if($request->param){
            $mhs = $this->monhoc->join('bomon', 'monhoc.bomon_id', '=', 'bomon.bomon_id')
                        ->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
                        ->select('monhoc.*', 'bomon.tenbomon', 'khoa.khoa_id', 'khoa.tenkhoa')
                        ->where('khoa.khoa_id', '=', $user[0]->khoa_id)
                        ->where(function($query) use ($request){
                            $query->where('tenmonhoc', 'like', '%'.$request->param.'%')
                                ->orWhere('monhoc_id', 'like', '%'.$request->param.'%')
                                ->orWhere('tenbomon', 'like', '%'.$request->param.'%');
                        })
                        ->orderBy('monhoc.monhoc_id', 'asc')
                        ->paginate(250);
        }
        else {
            $mhs = $this->monhoc->join('bomon', 'monhoc.bomon_id', '=', 'bomon.bomon_id')
                        ->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
                        ->select('monhoc.*', 'bomon.tenbomon', 'khoa.khoa_id', 'khoa.tenkhoa')
                        ->where('khoa.khoa_id', '=', $user[0]->khoa_id)
                        ->orderBy('monhoc.monhoc_id', 'asc')
                        ->paginate(8);
        }



        $i = 1;

        foreach($mhs as $mh){
            foreach($bms as $bm){
                if($mh->bomon_id == $bm->bomon_id){
                    $mh->tenbomon = $bm->tenbomon;
                }
            }
        }

        // dd($mhs);

        return view('monhoc.index',[
            'mhs' => $mhs,
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
        $bms = $this->bomon::all();

        $user = $this->user->join('bomon', 'users.bomon_id', '=', 'bomon.bomon_id')
            ->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
            ->where('users.user_id', Auth::user()->user_id)
            ->get();

        foreach($bms as $bm){
            if($bm->khoa_id == $user[0]->khoa_id){
                $this->htmlOptionBoMon .= '<option value="'.$bm->bomon_id.'">'.$bm->tenbomon.'</option>';
            }
        }

        return view('monhoc.create',[
            'bms' => $bms,
            'htmlOptionBoMon' => $this->htmlOptionBoMon,
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
        $monhoc = $this->monhoc->where('monhoc_id', $request->monhoc_id)->first();

        if($monhoc){
            \Session::put('monhoc', [
                'monhoc_id' => $request->monhoc_id,
                'tenmonhoc' => $request->tenmonhoc,
            ]);
            return redirect()->back()->with('error', 'M?? m??n h???c ???? t???n t???i');
        }

        $this->monhoc->create([
            'monhoc_id' => $request->monhoc_id,
            'tenmonhoc' => $request->tenmonhoc,
            'bomon_id' => $request->bomon_id,
        ]);

        return redirect()->route('monhoc.index')->with('success', 'Th??m m??n h???c th??nh c??ng');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mh = $this->monhoc->where('monhoc_id', $id)->first();
        // $mh = $this->monhoc::find($id);
        $bms = $this->bomon::all();

        foreach($bms as $bm){
            if($mh->bomon_id == $bm->bomon_id){
                $this->htmlOptionBoMon .= '<option value="'.$bm->bomon_id.'" selected>'.$bm->tenbomon.'</option>';
            }
            else{
                $this->htmlOptionBoMon .= '<option value="'.$bm->bomon_id.'">'.$bm->tenbomon.'</option>';
            }
        }

        return view('monhoc.edit',[
            'mh' => $mh,
            'htmlOptionBoMon' => $this->htmlOptionBoMon,
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
        $this->monhoc->where('monhoc_id', $id)->update([
            'monhoc_id' => $request->monhoc_id,
            'tenmonhoc' => $request->tenmonhoc,
            'bomon_id' => $request->bomon_id,
        ]);
        // $this->monhoc->find($id)->update([
        //     'monhoc_id' => $request->monhoc_id,
        //     'tenmonhoc' => $request->tenmonhoc,
        //     'bomon_id' => $request->bomon_id,
        // ]);
        return redirect()->route('monhoc.index')->with('success', 'C???p nh???t m??n h???c th??nh c??ng');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->phongthi_buoithi->join('buoithi', 'buoithi.id', '=', 'phongthi_buoithi.buoithi_id')
                            ->join('monthi_buoithi', 'monthi_buoithi.monthi_id', '=', 'buoithi.id')
                            ->join('monhoc', 'monhoc.monhoc_id', '=', 'monthi_buoithi.monthi_id')
                            ->where('monhoc.monhoc_id', $id)
                            ->delete();
        $this->cathi_buoithi->join('buoithi', 'buoithi.id', '=', 'cathi_buoithi.buoithi_id')
                            ->join('monthi_buoithi', 'monthi_buoithi.monthi_id', '=', 'buoithi.id')
                            ->join('monhoc', 'monhoc.monhoc_id', '=', 'monthi_buoithi.monthi_id')
                            ->where('monhoc.monhoc_id', $id)
                            ->delete();
        $this->monthi_buoithi->join('monhoc', 'monhoc.monhoc_id', '=', 'monthi_buoithi.monthi_id')
                            ->where('monhoc.monhoc_id', $id)
                            ->delete();
        $this->monhoc->where('monhoc_id', $id)->delete();
        // $this->monhoc->find($id)->delete();
        return redirect()->route('monhoc.index')->with('success', 'X??a m??n h???c th??nh c??ng');
    }
}
