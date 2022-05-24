<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use Hash;
use File;

class AccountSVController extends Controller
{
    private $sinhvien;

    public function __construct(SinhVien $sinhvien)
    {
        $this->sinhvien = $sinhvien;
    }

    public function LogupProcess(Request $request)
    {
        $sv = $this->sinhvien->where('sinhvien_id', $request->sinhvien_id)->first();
        if ($sv) {
            return redirect()->back()->with('error', 'Tài khoản đã tồn tại');
        } else {
            $this->sinhvien->create([
                'sinhvien_id' => $request->sinhvien_id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => \Hash::make($request->password),
                'avatar' => 'default.png',
                'thongbaomail' => 0,
            ]);
            return redirect()->back()->with('success', 'Đăng ký thành công');
        }
    }

    public function LoginProcess(Request $request)
    {
        $sv = $this->sinhvien->where('email', $request->email)->first();
        if ($sv) {
            if (\Hash::check($request->password, $sv->password)) {
                $sessionSV = [
                    'sinhvien_id' => $sv->sinhvien_id,
                    'name' => $sv->name,
                    'email' => $sv->email,
                    'avatar' => $sv->avatar,
                    'thongbaomail' => $sv->thongbaomail,
                ];
                \Session::put('sinhvien', $sessionSV);
                return redirect()->back()->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->back()->with('error', 'Mật khẩu không đúng');
            }
        } else {
            return redirect()->back()->with('error', 'Tài khoản không tồn tại');
        }
    }

    public function LogoutProcess()
    {
        \Session::forget('sinhvien');
        return redirect()->back()->with('success', 'Đăng xuất thành công');
    }
}
