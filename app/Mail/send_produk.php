<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class send_produk extends Mailable
{
    use Queueable, SerializesModels;

    public $transaksi;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transaksi)
    {
        $this->transaksi = $transaksi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.emails.send_product')
            ->with([$this->transaksi]);
    }
}
