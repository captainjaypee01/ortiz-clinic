<?php

namespace App\Mail\Frontend\Transaction;

use App\Models\Auth\User;
use App\Models\Production\Product;
use App\Models\Transaction\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $product;
    private $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Product $product, Order $order, $quantity)
    {
        $this->user = $user;
        $this->product = $product;
        $this->product->quantity = $quantity;
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
            ->view('frontend.mail.order-details')
            ->subject("Welcome to Ortiz Skin Clinic",  ['app_name' => app_name()])
            ->with([
                "user" => $this->user,
                "product" => $this->product,
                "order" => $this->order,
            ]);
    }
}
