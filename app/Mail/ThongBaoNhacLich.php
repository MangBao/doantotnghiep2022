<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ThongBaoNhacLich extends Mailable
{
    use Queueable, SerializesModels;
    private $users;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $users)
    {
        $this->users = $users;
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
                ]);
    }
}
