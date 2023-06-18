<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\URL;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $verificationLink;

    /**
     * Create a new message instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->verificationLink = $this->generateVerificationLink($user);
    }

    /**
     * Generate the email verification link.
     *
     * @param  User  $user
     * @return string
     */
    protected function generateVerificationLink(User $user)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $user->getKey(),
                'hash' => $user->verification_code,
            ]
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Email Verification')
            ->view('emails.verification')
            ->with(['verificationLink' => $this->verificationLink]);
    }
}
