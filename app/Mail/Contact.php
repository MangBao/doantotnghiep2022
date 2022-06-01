<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->data = [
            'maillist' => $request->maillist,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
        ];

        // return $this->subject('Hộp thư phản hồi')
        //         ->view('mail.contact')
        //         ->with([
        //             'name' => $this->data['name'],
        //             'email' => $this->data['email'],
        //             'content' => $this->data['content'],
        //         ]);
    }
}
