<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;
    protected $table = 'tinnhan';
    protected $fillable = [
        'msg_id', '	incoming_msg_id', 'outgoing_msg_id', 'msg', 'created_at', 'updated_at', 'tus'
    ];

    public function getListUser()
    {
        $getUser = \DB::table('users')->whereNotIn('giangvien_id', [Auth::user()->giangvien_id])->get();
        if ($getUser) {
            return $getUser;
        }
        else {
            return null;
        }
    }
}
