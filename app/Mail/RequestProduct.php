<?php

namespace App\Mail;

use App\Models\Suppliers;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestProduct extends Mailable
{
    use Queueable, SerializesModels;
    public $supplier, $productName, $productCode, $amount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Suppliers $supplier, $productName, $productCode, $amount)
    {
        $this->supplier = $supplier;
        $this->productName = $productName;
        $this->productCode = $productCode;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hieutd2310@gmail.com', 'GrApp')
            ->view('auth.admin.request_product_mail');
    }
}
