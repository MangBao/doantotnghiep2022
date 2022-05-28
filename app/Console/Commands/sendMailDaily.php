<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThongBaoNhacLich;
use App\Models\User;
use App\Models\LichCoiThi;

class sendMailDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:mail_send';
    private $user;
    private $lichcoithi;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an daily email to the users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user, LichCoiThi $lichcoithi)
    {
        parent::__construct();
        $this->user = $user;
        $this->lichcoithi = $lichcoithi;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lichcoithi = $this->lichcoithi->all();
        $users = $this->user->all();

        $first_date = strtotime(date('Y-m-d'));

        foreach($lichcoithi as $lct) {
            $second_date = strtotime($lct->ngaythi);
            $datediff = abs($first_date - $second_date);

            if(floor($datediff / (60*60*24)) == 2) {
                foreach($users as $user) {
                    if($user->email != null && $user->thongbaomail == 1 && $lct->user_id1 == $user->user_id) {
                        Mail::to($user->email)->send(new ThongBaoNhacLich($user, $lct));
                    }
                    if($user->email != null && $user->thongbaomail == 1 && $lct->user_id2 == $user->user_id) {
                        Mail::to($user->email)->send(new ThongBaoNhacLich($user, $lct));
                    }
                }
            }
        }

        $this->info('Daily Update mails has been send successfully');
    }
}
