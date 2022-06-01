<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TinTuc;

class TinTucSVController extends Controller
{
    private $tintuc;

    public function __construct(TinTuc $tintuc) {
        $this->tintuc = $tintuc;
    }

    public function show($id)
    {
        $tintuc = $this->tintuc
                    ->join('users', 'users.id', '=', 'tintuc.user_id')
                    ->join('roles', 'roles.id', '=', 'users.role_id')
                    ->select('tintuc.*', 'users.name', 'users.avatar', 'roles.role_name')
                    ->where('tintuc.id', $id)
                    ->first();

        $tt = $this->tintuc->all();
        $max_post = count($tt);
        $nextpost_id = $id + 1;
        $prevpost_id = $id - 1;

        // $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday');
        // dd($max_post);

        if($max_post > $nextpost_id) {
            $nextpost = $this->tintuc->where('id', $nextpost_id)->first();
        } else {
            $nextpost = null;
        }
        if($max_post > $prevpost_id){
            $prevpost = $this->tintuc->where('id', $prevpost_id)->first();
        } else {
            $prevpost = null;
        }

        // dd($tintuc);

        return view('tintuc.tintuc', [
            'tts' => $tintuc,
            'nextpost_id' => $nextpost_id,
            'prevpost_id' => $prevpost_id,
            'nextpost' => $nextpost,
            'prevpost' => $prevpost,
        ]);
    }
}
