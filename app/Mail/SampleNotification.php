<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SampleNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;

    /**
     * Create a new message instance.
     * @param string $name
     * @param string $text
     * @return void
     */
    public function __construct(string $name = 'テスト', string $text = 'テストです。')
    {
        $this->title = sprintf('%sさん、ありがとうございます。', $name);
        $this->text  = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails/sample_notification')
                    ->text('emails/sample_notification_plain')
                    ->subject($this->title)
                    ->with([
                        'text' => $this->text,
                    ]);
        ;
    }
}
