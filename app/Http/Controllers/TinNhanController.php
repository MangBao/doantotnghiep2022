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
        $this->middleware('sinhvien');
    }

    public function index()
    {
        return view('tinnhan.tinnhan');
    }

    public function getlistuser()
    {
        $getUser = Message::getListUser()->toArray();
        $outgoing_id = Auth::user()->user_id;

        for($i = 0; $i < count($getUser); $i++) {
            $mess = \DB::select("SELECT * FROM messages WHERE (incoming_msg_id = {$getUser[$i]->user_id}
                                OR outgoing_msg_id = {$getUser[$i]->user_id}) AND (outgoing_msg_id = {$outgoing_id}
                                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1");

            (count($mess) > 0 && isset($mess[0])) ? $result = $mess[0]->msg : $result ="No message available";
            (isset($mess[0]) && $mess[0]->tus == 1) ? $result = 'Đã gỡ 1 tin nhắn' : $result;
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

            if(isset($mess[0]->outgoing_msg_id)) {
                ($outgoing_id == $mess[0]->outgoing_msg_id) ? $you = "You: " : $you = "";
            }else{
                $you = "";
            }
            ($getUser[$i]->trangthaihoatdong == 0) ? $offline = "offline" : $offline = "";
            ($outgoing_id == $getUser[$i]->user_id) ? $hid_me = "hide" : $hid_me = "";

            $this->output .= '<a class="js-user dark:border-gray-500" href="'. route('tinnhan.viewchat', [$getUser[$i]->user_id]) .'">
                        <div class="content">
                        <img src="/images/'. $getUser[$i]->avatar .'" alt="">
                        <div class="details">
                            <span class="dark:text-gray-400">'. $getUser[$i]->name .'</span>
                            <p class="dark:text-gray-500">'. $you . $msg .'</p>
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
        $outgoing_id = Auth::user()->user_id;

        $user = \DB::select("SELECT * FROM users WHERE user_id = {$incoming_id}");

        return view('tinnhan.chat', [
            'user' => $user[0]
        ]);
    }

    public function getstatususer($id)
    {
        $user = \DB::select("SELECT * FROM users WHERE user_id = {$id}");
        if($user[0]->trangthaihoatdong == 0) {
            return "Offline now";
        }else{
            return "Active now";
        }
    }

    public function getchat($id)
    {
        $incoming_id = $id;
        $outgoing_id = Auth::user()->user_id;
        $user = \DB::select("SELECT * FROM users WHERE user_id = {$incoming_id}");
        $mess = \DB::select("SELECT * FROM messages LEFT JOIN users ON users.user_id = messages.outgoing_msg_id
                            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id");
        $trashicon = '<i class="fa-solid fa-trash-can"></i>';
        $backicon = '<i class="fa-solid fa-rotate-left"></i>';
        $icon = '';

        if(count($mess) > 0) {
            for($i = 0; $i < count($mess); $i++) {
                if($mess[$i]->outgoing_msg_id == $outgoing_id){
                    $icon = $mess[$i]->tus == 0 ? $trashicon : $backicon;
                    $classmess = $mess[$i]->tus == 0 ? '' : 'back-mess';
                    $classlink = $mess[$i]->tus == 0 ? 'js-trash' : 'js-back';
                    $contentmess = $mess[$i]->tus == 0 ? $mess[$i]->msg : 'Bạn đã thu hồi 1 tin !';
                    $title = $mess[$i]->tus == 0 ? 'Thu hồi tin nhắn' : 'Hoàn tác tin nhắn';
                    $cssdarkmode = $mess[$i]->tus == 0 ? '' : 'dark:text-black';
                    $link = $mess[$i]->tus == 0 ? route('tinnhan.deletechat',[$mess[$i]->msg_id]) : route('tinnhan.takebackmess',[$mess[$i]->msg_id]);

                    $this->outputchat .= '<div class="chat outgoing">
                                    <div class="details">
                                        <a id="'.$mess[$i]->msg_id.'" href="'. $link .'" class="'.$classlink.'" title="'.$title.'">
                                            '.$icon.'
                                        </a>
                                        <p class="'. $classmess .' '.' '.' '. $cssdarkmode .'">'. $contentmess .'</p>
                                    </div>
                                </div>';
                }else{
                    $contentmess = $mess[$i]->tus == 0 ? $mess[$i]->msg : 'Tin nhắn đã bị thu hồi !';
                    $title = $mess[$i]->tus == 0 ? 'Thu hồi tin nhắn' : 'Hoàn tác tin nhắn';
                    $cssdarkmode = $mess[$i]->tus == 0 ? '' : 'dark:text-black';
                    $classmess = $mess[$i]->tus == 0 ? '' : 'back-mess';

                    $this->outputchat .= '<div class="chat incoming">
                                <img src="/images/'.$user[0]->avatar.'" alt="">
                                <div class="details">
                                    <p class="'. $classmess .' '.' '.' '. $cssdarkmode .'">'. $contentmess .'</p>
                                </div>
                                </div>';
                }
            }
        }
        else {
            $this->outputchat .= '<div class="text dark:text-gray-400">No messages are available. Once you send message they will appear here.</div>';
        }

        return $this->outputchat;
    }

    public function insertchat(Request $request)
    {
        $incoming_id = $request->input('incoming_id');
        $outgoing_id = Auth::user()->user_id;
        $mess = $request->input('message');

        if(!empty($mess)) {
            \DB::insert("INSERT INTO messages (outgoing_msg_id, incoming_msg_id, msg)
                        VALUES ({$outgoing_id}, {$incoming_id}, '{$mess}')") or die();
        }
    }

    public function deletechat($id)
    {
        $getmess = \DB::select("SELECT * FROM messages WHERE msg_id = {$id}");
        $id = $id;
        \DB::update("UPDATE messages SET tus = 1 WHERE msg_id = {$id}") or die();
        return redirect()->route('tinnhan.viewchat', [$getmess[0]->incoming_msg_id]);
    }

    public function takebackmess($id)
    {
        $getmess = \DB::select("SELECT * FROM messages WHERE msg_id = {$id}");
        $id = $id;
        \DB::update("UPDATE messages SET tus = 0 WHERE msg_id = {$id}") or die();
        return redirect()->route('tinnhan.viewchat', [$getmess[0]->incoming_msg_id]);
    }
}
