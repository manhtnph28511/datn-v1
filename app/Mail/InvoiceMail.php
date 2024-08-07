<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user,$order;

    public function __construct($user,$order)
    {
        $this->user = $user;
        $this->order = $order;
    }
    public function build()
    {
        $pdf = PDF::loadView('admin.pages.orders.downloadInvoice', [
            'order' => $this->order,
            'font_family' => "'Roboto','sans-serif'",
            'direction' => 'ltr',
            'default_text_align' => 'left',
            'reverse_text_align' => 'right'
        ]);
        return $this->view('mail.invoice')
            ->with([
                'user' => $this->user,
                'order' => $this->order
            ])->subject('Hoá đơn INV'. $this->order->id .' tại ' . env('APP_NAME'))
            ->attachData($pdf->output(), 'INV' . $this->order->id . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
