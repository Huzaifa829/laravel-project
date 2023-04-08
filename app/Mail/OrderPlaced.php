<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $productscollection;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order,$collectionproducts)
    {
        $this->order = $order;
        $this->productscollection = $collectionproducts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->order->billing_email,$this->order->billing_name)
                    // ->bcc('third@third.com')
                    ->subject('Receipt for Order Confirmation')
                    ->view('mail.order.orderplaced');
    }
}
