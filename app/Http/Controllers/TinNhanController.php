<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\GiangVien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TinNhanController extends Controller
{
    private $output;
    private $outputchat;

    public function __construct() {
        $this->output = '';
        $this->outputchat = '';
        $this->middleware('auth');
    }

    public function index()
    {
        return view('tinnhan.tinnhan');
    }

    public function getlistuser()
    {
        $getUser = Message::getListUser()->toArray();
        $outgoing_id = Auth::user()->giangvien_id;

        for($i = 0; $i < count($getUser); $i++) {
            $mess = \DB::select("SELECT * FROM messages WHERE (incoming_msg_id = {$getUser[$i]->giangvien_id}
                                OR outgoing_msg_id = {$getUser[$i]->giangvien_id}) AND (outgoing_msg_id = {$outgoing_id}
                                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1");

            (count($mess) > 0 && isset($mess[0])) ? $result = $mess[0]->msg : $result ="No message available";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

            if(isset($mess[0]->outgoing_msg_id)) {
                ($outgoing_id == $mess[0]->outgoing_msg_id) ? $you = "You: " : $you = "";
            }else{
                $you = "";
            }
            ($getUser[$i]->trangthaihoatdong == 0) ? $offline = "offline" : $offline = "";
            ($outgoing_id == $getUser[$i]->giangvien_id) ? $hid_me = "hide" : $hid_me = "";

            $this->output .= '<a class="js-user" href="'. route('tinnhan.viewchat', [$getUser[$i]->giangvien_id]) .'">
                        <div class="content">
                        <img src="/images/'. $getUser[$i]->avatar .'" alt="">
                        <div class="details">
                            <span>'. $getUser[$i]->name .'</span>
                            <p>'. $you . $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                    </a>';
        }

        return $this->output;
    }

    public function viewchat($id)
    {
        $incoming_id = $id;
        $outgoing_id = Auth::user()->giangvien_id;

        $user = \DB::select("SELECT * FROM users WHERE giangvien_id = {$incoming_id}");

        return view('tinnhan.chat', [
            'user' => $user[0]
        ]);
    }

    public function getstatususer($id)
    {
        $user = \DB::select("SELECT * FROM users WHERE giangvien_id = {$id}");
        if($user[0]->trangthaihoatdong == 0) {
            return "Offline now";
        }else{
            return "Active now";
        }
    }

    public function getchat($id)
    {
        $incoming_id = $id;
        $outgoing_id = Auth::user()->giangvien_id;

        $user = \DB::select("SELECT * FROM users WHERE giangvien_id = {$incoming_id}");
        // dd($user);
        $mess = \DB::select("SELECT * FROM messages LEFT JOIN users ON users.giangvien_id = messages.outgoing_msg_id
                            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id");

        if(count($mess) > 0) {
            for($i = 0; $i < count($mess); $i++) {
                if($mess[$i]->outgoing_msg_id == $outgoing_id){
                    $this->outputchat .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $mess[$i]->msg .'</p>
                                </div>
                                </div>';
                }else{
                    $this->outputchat .= '<div class="chat incoming">
                                <img src="/images/'.$user[0]->avatar.'" alt="">
                                <div class="details">
                                    <p>'. $mess[$i]->msg .'</p>
                                </div>
                                </div>';
                }
            }
        }
        else {
            $this->outputchat .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }

        return $this->outputchat;
    }

    public function insertchat(Request $request)
    {
        $incoming_id = $request->input('incoming_id');
        $outgoing_id = Auth::user()->giangvien_id;
        $mess = $request->input('message');

        if(!empty($mess)) {
            \DB::insert("INSERT INTO messages (outgoing_msg_id, incoming_msg_id, msg)
                        VALUES ({$outgoing_id}, {$incoming_id}, '{$mess}')") or die();
        }
    }
}
