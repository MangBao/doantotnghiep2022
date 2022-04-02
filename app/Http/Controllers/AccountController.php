<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\GiangVien;
use Hash;
use File;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Login_Process(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // Tìm giảng viên theo mã giảng viên
        $giangvien = GiangVien::findUserByEmail($email);

        if($giangvien != null){
            if($password == $giangvien[0]->password){
                // Đăng nhập thành công
                \Session::put('idgiangvien', $giangvien[0]->idgiangvien);
                \Session::put('tengiangvien', $giangvien[0]->tengiangvien);
                \Session::put('email', $giangvien[0]->email);

                return redirect('/admin/index');
            }
            else{
                // Đăng nhập thất bại
                $errors = new MessageBag(['password' => ['Mật khẩu không đúng']]);
                return redirect('/login')->withErrors($errors);
            }
            // dd($giangvien[0]->password);
        }
    }
}
