<?php

namespace App\Jobs;

use App\enums\Rol;
use App\enums\Status;
use App\Models\Email;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private Email $email) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::raw($this->email->body, function ($message) {
            $message->to($this->email->destinatary)
                ->subject($this->email->subject);
        });

        $this->email->update([
            'status' => Status::SENT
        ]);
    }
}
