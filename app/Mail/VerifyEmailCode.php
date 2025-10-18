<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmailCode extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $verificationCode;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->verificationCode = $user->verification_code;
    }

    public function build()
    {
        return $this->subject('Email Verification Code')
                    ->markdown('emails.verify')
                    ->with([
                        'first_name' => $this->user->first_name,
                        'verificationCode' => $this->verificationCode,
                    ]);
    }
}
