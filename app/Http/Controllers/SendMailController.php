<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThongBaoNhacLich;
use App\Models\User;
use App\Models\LichCoiThi;


class SendMailController extends Controller
{
    private $user;
    private $lichcoithi;

    public function __construct(User $user, LichCoiThi $lichcoithi) {
        $this->user = $user;
        $this->lichcoithi = $lichcoithi;
        $this->middleware('auth');
    }

    public function sendMail()
    {
        // $lichcoithi = $this->lichcoithi->all();
        // $users = $this->user->all();

        // foreach($lichcoithi as $lct) {
        //     if(date('d', strtotime($lct->ngaythi)) - date('d') == 2) {
        //         foreach($users as $user) {
        //             if($lct->giangvien_id1 == $user->id) {
        //                 $usermail = $this->user->find($user->id);
        //                 dd($usermail->name);
        //                 // $mailable = new ThongBaoNhacLich($users);
        //                 // Mail::to($user->email)->send($mailable);
        //             }
        //             if($lct->giangvien_id2 == $user->id) {
        //                 $usermail = $this->user->find($user->id);
        //                 echo $usermail->name;
        //                 // $mailable = new ThongBaoNhacLich($users);
        //                 // Mail::to($user->email)->send($mailable);
        //             }
        //         }
        //     }
        // }
        $user = $this->user->find(1);
        $mailable = new ThongBaoNhacLich($user);
        Mail::to($user->email)->send($mailable);
        return true;
    }
}
