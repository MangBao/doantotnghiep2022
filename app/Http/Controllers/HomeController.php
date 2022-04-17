<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quyen_GiangVien;
use App\Models\DSQuyen;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $quyens = Quyen_GiangVien::all();
        // $dsquyen = DSQuyen::all();

        // foreach($quyens as $q){
        //     if($q->giangvien_id == Auth::user()->giangvien_id){
        //         foreach($dsquyen as $d){
        //             if($q->quyen_id == $d->quyen_id){
        //                 Auth::user()->quyen = $d->quyen_id;
        //                 Auth::user()->tenquyen = $d->tenquyen;
        //             }
        //         }
        //     }
        // }

        return view('admin');
    }
}
