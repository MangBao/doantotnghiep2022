<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\LichCoiThi;

class ThongBaoNhacLich extends Mailable
{
    use Queueable, SerializesModels;
    private $users;
    private $lichcoithi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $users, LichCoiThi $lichcoithi)
    {
        $this->users = $users;
        $this->lichcoithi = $lichcoithi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thông báo nhắc lịch thi')
                ->view('mail.thongbaonhaclich')
                ->with([
                    'users' => $this->users,
                    'lct' => $this->lichcoithi
                ]);
    }
}
