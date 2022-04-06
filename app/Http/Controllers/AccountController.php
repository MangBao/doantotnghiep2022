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

    public function Login_Process(Request $request) {

        $email = $request->email;
        $password = $request->password;

        // Tìm giảng viên theo mã giảng viên
        $giangvien = GiangVien::findUserByEmail($email);

        if($giangvien != null) {
            if($password == $giangvien[0]->password) {

                // Đăng nhập thành công
                \Session::put('user', [
                    'idgiangvien' => $giangvien[0]->idgiangvien,
                    'tengiangvien' => $giangvien[0]->tengiangvien,
                    'email' => $giangvien[0]->email,
                    'idquyen' => $giangvien[0]->idquyen,
                    'hinhanh' => $giangvien[0]->avatar
                ]);

                if(!\Session::has('user')) {
                    $this->redirectTo('/', 'login');
                }

                return redirect('/index');
            }
            else {
                // Đăng nhập thất bại
                $errors = new MessageBag(['password' => ['Mật khẩu không đúng']]);
                return redirect('/login')->withErrors($errors);
            }
            // dd($giangvien[0]->password);
        }
    }

    public function Logout()
    {
        // Xóa phiên làm việc của người đang đăng nhập.
        \Session::forget('user');

        // Load trang chủ.
        return redirect('/');
    }

}
