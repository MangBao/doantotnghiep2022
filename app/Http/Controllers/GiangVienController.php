<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\BoMon;
use App\Models\GiangVien;
use App\Models\Roles;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class GiangVienController extends Controller
{
    private $htmlOptionQuyen;
    private $giangvien;
    private $bomon;
    private $roles;
    private $htmlOptionBoMon;

    public function __construct(GiangVien $giangvien, Bomon $bomon, Roles $roles) {
        $this->htmlOptionQuyen = '';
        $this->giangvien = $giangvien;
        $this->bomon = $bomon;
        $this->roles = $roles;
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
            $gvs = $this->giangvien->where('role_id', '!=', 4)
                        ->where('name', 'like', '%' . $request->param . '%')->orderBy('id', 'asc')->paginate(250);
        } else {
            $gvs = $this->giangvien->where('role_id', '!=', 4)->orderBy('id', 'asc')->paginate(8);
        }
        $dsq = $this->roles::all();

        // dd($gvs);

        $i = 1;
        return view('giangvien.index',[
            'gvs' => $gvs,
            'dsq' => $dsq,
            'i' => $i
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gvs = $this->giangvien::where('role_id', '!=', 4)->get();
        $dsq = $this->roles::all();
        $bm = $this->bomon::all();
        $user_id = '2022' . rand(100, 999);

        // Option quyen
        foreach($dsq as $d){
            $this->htmlOptionQuyen .= '<option value="'.$d->id.'">'. $d->role_name .'</option>';
        }
        // Option bo mon
        foreach($bm as $b){
            $this->htmlOptionBoMon .= '<option value="'.$b->bomon_id.'">'.$b->tenbomon.'</option>';
        }
        // Ki???m tra m?? gi???ng vi??n tr??ng
        foreach($gvs as $gv) {
            if($gv->user_id == $user_id){
                $user_id = '2022' . rand(100, 999);
            }
        }

        return view('giangvien.create', [
            'htmlOptionQuyen' => $this->htmlOptionQuyen,
            'user_id' => $user_id,
            'htmlOptionBoMon' => $this->htmlOptionBoMon
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

        $gvs = $this->giangvien::where('role_id', '!=', 4)->get();

        foreach($gvs as $gv) {
            if($gv->user_id == $request->user_id){

                if($request->avatar){
                    $avatar = $request->avatar;
                    $avatar_name = $avatar->getClientOriginalName();
                }
                else{
                    $avatar_name = 'user_avt.png';
                }
                \Session::put('gv', [
                    'name' => $request->tengiangvien,
                    'email' => $request->email,
                    'avatar' => $avatar_name,
                    'connho' => $request->connho,
                    'ngaysinh' => $request->ngaysinh,
                    'diachi' => $request->diachi,
                    'sodienthoai' => $request->sdt,
                ]);

                // dd(session()->get('gv')['name']);

                return redirect()->back()->with('error', 'M?? gi???ng vi??n ???? t???n t???i');
            }
            if($gv->email == $request->email){

                if($request->avatar){
                    $avatar = $request->avatar;
                    $avatar_name = $avatar->getClientOriginalName();
                }
                else{
                    $avatar_name = 'user_avt.png';
                }
                \Session::put('gv', [
                    'name' => $request->tengiangvien,
                    'email' => $request->email,
                    'avatar' => $avatar_name,
                    'connho' => $request->connho,
                    'ngaysinh' => $request->ngaysinh,
                    'diachi' => $request->diachi,
                    'sodienthoai' => $request->sdt,
                ]);

                // dd(session()->get('gv')['name']);

                return redirect()->back()->with('error', 'Email ???? t???n t???i');
            }
        }

        if($request->avatar){
            $avatar = $request->avatar;
            $avatar_name = $avatar->getClientOriginalName();
            Storage::disk('public')->putFileAs('images', $avatar, $avatar_name);
        }
        else{
            $avatar_name = 'user_avt.png';
        }

        $this->giangvien->create([
            'user_id' => $request->user_id,
            'name' => $request->tengiangvien,
            'email' => $request->email,
            'connho' => $request->connho,
            'ngaysinh' => $request->ngaysinh,
            'diachi' => $request->diachi,
            'sodienthoai' => $request->sdt,
            'avatar' => $avatar_name,
            'password' => bcrypt('12345678'),
            'bomon_id' => $request->bomon,
            'role_id' => $request->quyen
        ]);

        return redirect()->route('giangvien.index')->with('success', 'Th??m gi???ng vi??n th??nh c??ng');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gv = $this->giangvien::find($id);
        $dsq = $this->roles::all();
        $bm = $this->bomon::all();
        foreach($dsq as $d){
            if($d->id === $gv->role_id){
                $this->htmlOptionQuyen .= '<option value="'.$d->id.'" selected>'. $d->role_name .'</option>';
            } else {
                $this->htmlOptionQuyen .= '<option value="'.$d->id.'">'.$d->role_name.'</option>';
            }
        }
        // Option bo mon
        foreach($bm as $b){
            if($b->bomon_id == $gv->bomon_id){
                $this->htmlOptionBoMon .= '<option value="'.$b->bomon_id.'" selected>'.$b->tenbomon.'</option>';
            } else {
                $this->htmlOptionBoMon .= '<option value="'.$b->bomon_id.'">'.$b->tenbomon.'</option>';
            }
        }

        return view('giangvien.edit', [
            'gv' => $gv,
            'htmlOptionQuyen' => $this->htmlOptionQuyen,
            'htmlOptionBoMon' => $this->htmlOptionBoMon
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
        $gv = $this->giangvien::find($id);

        if($request->avatar){
            $avatar = $request->avatar;
            $avatar_name = $avatar->getClientOriginalName();
            Storage::disk('public')->putFileAs('images', $avatar, $avatar_name);
        }
        else{
            $avatar_name = $gv->avatar;
        }

        $this->giangvien::find($id)->update([
            'name' => $request->tengiangvien,
            'email' => $request->email,
            'connho' => $request->connho,
            'ngaysinh' => $request->ngaysinh,
            'diachi' => $request->diachi,
            'sodienthoai' => $request->sdt,
            'avatar' => $avatar_name,
            'bomon_id' => $request->bomon,
            'role_id' => $request->quyen
        ]);

        return redirect()->route('giangvien.index')->with('success', 'C???p nh???t th??nh c??ng');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $gv = $this->giangvien::find($id)->toArray();

        // $gv = $this->giangvien::find($id);
        if($gv['role_id'] == 1){
            return redirect()->route('giangvien.index')->with('error', 'Kh??ng th??? x??a qu???n tr??? vi??n');
        } else {
            $this->giangvien::find($id)->delete();
            return redirect()->route('giangvien.index')->with('success', 'X??a th??nh c??ng');
        }

    }

    public function import()
    {
        Excel::import(new UsersImport,request()->file('file'));

        return redirect()->route('giangvien.index')->with('success', 'Import th??nh c??ng');
    }

    // public function search(Request $request)
    // {
    //     dd($request->all());
    // }
}
