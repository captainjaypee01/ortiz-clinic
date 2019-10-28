<?php

namespace App\Mail\Backend\Transaction;

use App\Models\Auth\User;
use App\Models\Production\Product;
use App\Models\Transaction\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Order $order)
    {
        $this->user = $user;
        $this->order = $order;
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
            ->view('backend.mail.payment-approve-order')
            ->subject("Welcome to Ortiz Skin Clinic",  ['app_name' => app_name()])
            ->with([
                "user" => $this->user,
                "order" => $this->order,
            ]);
    }
}
