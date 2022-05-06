<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class CheckKhoa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = DB::table('users')
            ->join('bomon', 'users.bomon_id', '=', 'bomon.bomon_id')
            ->join('khoa', 'bomon.khoa_id', '=', 'khoa.khoa_id')
            ->where('users.giangvien_id', Auth::user()->giangvien_id)
            ->get();
        $mhs = DB::select('select * from monhoc m, bomon b, khoa k where m.bomon_id = b.bomon_id and b.khoa_id = k.khoa_id and monhoc_id = ?', [$request->id]);

        $bms = DB::select('select * from bomon where bomon_id = ?', [$request->id]);

        if($mhs != null || count($mhs) > 0) {
            if($user[0]->khoa_id != $mhs[0]->khoa_id){
                return redirect()->route('monhoc.index')->with('error', 'Bạn không có quyền truy cập chức năng khoa khác');
            }
        }

        if($bms != null || count($bms) > 0) {
            if($user[0]->khoa_id != $bms[0]->khoa_id){
                return redirect()->route('bomon.index')->with('error', 'Bạn không có quyền truy cập chức năng khoa khác');
            }
        }

        return $next($request);
    }
}
