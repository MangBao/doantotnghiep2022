<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BoMon;
use App\Models\Khoa;
use App\Models\User;

class BoMonController extends Controller
{
    private $bomon;
    private $khoa;
    private $user;
    private $htmlOptionKhoa;

    public function __construct(BoMon $bomon, Khoa $khoa, User $user) {
        $this->bomon = $bomon;
        $this->khoa = $khoa;
        $this->user = $user;
        $this->htmlOptionKhoa = '';
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('khoa');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khoa = $this->khoa::all();

        $user = $this->user->join('bomon', 'users.bomon_id', '=', 'bomon.bomon_id')
                ->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
                ->select('users.*', 'bomon.tenbomon', 'khoa.khoa_id', 'khoa.tenkhoa')
                ->where('users.giangvien_id', '=', Auth::user()->giangvien_id)
                ->get();

        if (Auth::user()->role_id == 1) {
            $bms = $this->bomon->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')->orderBy('bomon_id', 'desc')->paginate(8);
        } else {
            $bms = $this->bomon->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
                ->select('bomon.*', 'khoa.khoa_id', 'khoa.tenkhoa')
                ->where('khoa.khoa_id', '=', $user[0]->khoa_id)
                ->orderBy('bomon.bomon_id', 'asc')
                ->paginate(8);
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
            ->where('users.giangvien_id', Auth::user()->giangvien_id)
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
        $this->bomon->create([
            'tenbomon' => $request->tenbomon,
            'khoa_id' => $request->khoa_id,
            'bomon_id' => $request->bomon_id,
        ]);

        return redirect()->route('bomon.index')->with('success', 'Thêm bộ môn thành công');
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
        ->where('users.giangvien_id', Auth::user()->giangvien_id)
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
        $this->bomon->where('bomon_id', $id)->delete();
        return redirect()->route('bomon.index')->with('success', 'Xóa bộ môn thành công');
    }
}
