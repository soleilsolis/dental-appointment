<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Appointment;
use Carbon\Carbon;

class Schedule extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public Appointment $appointment,
    )
    {

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: "Schedule for Appointment {$this->appointment->id}",
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'vendor.mail.html.layout',
            with: [
                'slot' => "Hi {$this->appointment->patient->first_name}! Appointment #{$this->appointment->id} is set for "
                    .Carbon::parse($this->appointment->date)->format('M d, Y')." @ "
                    .Carbon::parse($this->appointment->start_time)->format('g:i A')." - "
                    .Carbon::parse($this->appointment->end_time)->format('g:i A')
                    .".\n This appointment may be canceled or rescheduled if you fail to show. Thank you! \n -RM DENTAL"

            ]
        );  
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
