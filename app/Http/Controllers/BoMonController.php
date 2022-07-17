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

class BoMonController extends Controller
{
    private $bomon;
    private $monhoc;
    private $khoa;
    private $user;
    private $buoithi;
    private $phongthi_buoithi;
    private $monthi_buoithi;
    private $cathi_buoithi;
    private $htmlOptionKhoa;

    public function __construct(BoMon $bomon, Khoa $khoa, User $user, MonHoc $monhoc, BuoiThi $buoithi, PhongThi_BuoiThi $phongthi_buoithi, MonThi_BuoiThi $monthi_buoithi, CaThi_BuoiThi $cathi_buoithi) {
        $this->bomon = $bomon;
        $this->monhoc = $monhoc;
        $this->khoa = $khoa;
        $this->user = $user;
        $this->buoithi = $buoithi;
        $this->phongthi_buoithi = $phongthi_buoithi;
        $this->monthi_buoithi = $monthi_buoithi;
        $this->cathi_buoithi = $cathi_buoithi;
        $this->htmlOptionKhoa = '';
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
        $khoa = $this->khoa::all();

        $user = $this->user->join('bomon', 'users.bomon_id', '=', 'bomon.bomon_id')
                ->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
                ->select('users.*', 'bomon.tenbomon', 'khoa.khoa_id', 'khoa.tenkhoa')
                ->where('users.user_id', '=', Auth::user()->user_id)
                ->get();

        if($request->param)
        {
            if (Auth::user()->role_id == 1) {
                $bms = $this->bomon->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
                            ->where('tenbomon', 'like', '%'.$request->param.'%')
                            ->orWhere('bomon_id', 'like', '%'.$request->param.'%')
                            ->orWhere('khoa.tenkhoa', 'like', '%'.$request->param.'%')
                            ->orderBy('bomon_id', 'desc')->paginate(250);
            } else {
                $bms = $this->bomon->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
                            ->select('bomon.*', 'khoa.khoa_id', 'khoa.tenkhoa')
                            ->where('khoa.khoa_id', '=', $user[0]->khoa_id)
                            ->where(function($query) use ($request){
                                $query->where('tenbomon', 'like', '%'.$request->param.'%')
                                    ->orWhere('bomon_id', 'like', '%'.$request->param.'%')
                                    ->orWhere('khoa.tenkhoa', 'like', '%'.$request->param.'%');
                            })
                            ->orderBy('bomon.bomon_id', 'asc')
                            ->paginate(250);
            }
        }
        else
        {
            if (Auth::user()->role_id == 1) {
                $bms = $this->bomon->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')->orderBy('bomon_id', 'desc')->paginate(8);
            } else {
                $bms = $this->bomon->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
                    ->select('bomon.*', 'khoa.khoa_id', 'khoa.tenkhoa')
                    ->where('khoa.khoa_id', '=', $user[0]->khoa_id)
                    ->orderBy('bomon.bomon_id', 'asc')
                    ->paginate(8);
            }
        }




        $i = 1;
        // dd($user);
        return view('bomon.index',[
            'bms' => $bms,
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
        $khoa = $this->khoa::all();

        $user = $this->user->join('bomon', 'users.bomon_id', '=', 'bomon.bomon_id')
            ->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
            ->where('users.user_id', Auth::user()->user_id)
            ->get();

        if (Auth::user()->role_id == 1) {
            foreach($khoa as $k){
                $this->htmlOptionKhoa .= '<option value="'.$k->khoa_id.'">'.$k->tenkhoa.'</option>';
            }
        } else {
            foreach($khoa as $k){
                if($k->khoa_id == $user[0]->khoa_id){
                    $this->htmlOptionKhoa .= '<option value="'.$k->khoa_id.'">'.$k->tenkhoa.'</option>';
                }
            }
        }

        return view('bomon.create',[
            'htmlOptionKhoa' => $this->htmlOptionKhoa,
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
        $bomon = $this->bomon->where('bomon_id', $request->bomon_id)->first();

        if ($bomon) {
            \Session::put('bomon', [
                'bomon_id' => $request->bomon_id,
                'tenbomon' => $request->tenbomon,
            ]);
            return redirect()->back()->with('error', 'Mã bộ môn đã tồn tại');
        } else {
            $this->bomon->create([
                'tenbomon' => $request->tenbomon,
                'khoa_id' => $request->khoa_id,
                'bomon_id' => $request->bomon_id,
            ]);

            return redirect()->route('bomon.index')->with('success', 'Thêm bộ môn thành công');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->join('bomon', 'users.bomon_id', '=', 'bomon.bomon_id')
        ->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
        ->where('users.user_id', Auth::user()->user_id)
        ->get();
        $bm = $this->bomon->where('bomon_id', $id)->first();
        $khoa = $this->khoa::all();

        if (Auth::user()->role_id == 1) {
            foreach($khoa as $k){
                if($bm->khoa_id == $k->khoa_id){
                    $this->htmlOptionKhoa .= '<option value="'.$k->khoa_id.'" selected>'.$k->tenkhoa.'</option>';
                }
                else{
                    $this->htmlOptionKhoa .= '<option value="'.$k->khoa_id.'">'.$k->tenkhoa.'</option>';
                }
            }
        }
        else {
            foreach($khoa as $k){
                if($k->khoa_id == $user[0]->khoa_id && $bm->khoa_id == $k->khoa_id){
                    $this->htmlOptionKhoa .= '<option value="'.$k->khoa_id.'" selected>'.$k->tenkhoa.'</option>';
                }
            }
        }

        return view('bomon.edit',[
            'bm' => $bm,
            'htmlOptionKhoa' => $this->htmlOptionKhoa,
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
        $this->bomon->where('bomon_id', $id)->update([
            'tenbomon' => $request->tenbomon,
            'khoa_id' => $request->khoa_id,
            'bomon_id' => $request->bomon_id,
        ]);

        return redirect()->route('bomon.index')->with('success', 'Cập nhật bộ môn thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $check = $this->user->where('bomon_id', $id)->where('role_id', 1)->count();
        // dd($check);
        if($check == 1){
            return redirect()->back()->with('error', 'Bộ môn này đang dùng cho Admin, không thể xóa');
        }
        else{
            $this->phongthi_buoithi->join('buoithi', 'buoithi.id', '=', 'phongthi_buoithi.buoithi_id')
                                ->join('monthi_buoithi', 'monthi_buoithi.monthi_id', '=', 'buoithi.id')->join('monhoc', 'monhoc.monhoc_id', '=', 'monthi_buoithi.monthi_id')
                                ->join('bomon', 'bomon.bomon_id', '=', 'monhoc.bomon_id')->where('bomon.bomon_id', $id)
                                ->delete();
            $this->cathi_buoithi->join('buoithi', 'buoithi.id', '=', 'cathi_buoithi.buoithi_id')
                                ->join('monthi_buoithi', 'monthi_buoithi.monthi_id', '=', 'buoithi.id')->join('monhoc', 'monhoc.monhoc_id', '=', 'monthi_buoithi.monthi_id')
                                ->join('bomon', 'bomon.bomon_id', '=', 'monhoc.bomon_id')->where('bomon.bomon_id', $id)
                                ->delete();
            $this->monthi_buoithi->join('monhoc', 'monhoc.monhoc_id', '=', 'monthi_buoithi.monthi_id')
                                ->join('bomon', 'bomon.bomon_id', '=', 'monhoc.bomon_id')->where('bomon.bomon_id', $id)
                                ->delete();
            $this->user->where('bomon_id', $id)->delete();
            $this->bomon->where('bomon_id', $id)->delete();
            $this->monhoc->where('bomon_id', $id)->delete();
            return redirect()->route('bomon.index')->with('success', 'Xóa bộ môn thành công');
        }

    }
}
