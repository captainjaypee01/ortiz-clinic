<?php

namespace App\Mail\Backend\Transaction;

use App\Models\Auth\User;
use App\Models\Record\Service; 
use App\Models\Transaction\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservationPaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $service;
    private $reservation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Reservation $reservation)
    {
        $this->user = $user; 
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from([ "address" => "clinic.ortizskin@gmail.com", "name" => "Ortiz Skin Clinic" ])
            ->view('backend.mail.payment-approve-reservation')
            ->subject("Welcome to Ortiz Skin Clinic",  ['app_name' => app_name()])
            ->with([
                "user" => $this->user,
                "reservation" => $this->reservation,
            ]);
    }
}
