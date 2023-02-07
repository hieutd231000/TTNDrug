<?php


namespace App\Mail;


use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $user, $otp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $otp)
    {
        $this->user = $user;
        $this->otp = $otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hieutd2310@gmail.com', 'GrApp')
            ->view('auth.admin.reset_password_mail');
    }
}
