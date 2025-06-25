<?php

namespace App\Console\Commands;

use App\enums\Status;
use App\Jobs\SendEmail;
use App\Models\Email;
use Illuminate\Console\Command;

class EmailsProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'process emails in the queue';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $emails = Email::with('user')->where('status', Status::PENDING)
            ->orderBy('created_at', 'asc')
            ->get();

        if ($emails->isEmpty()) {
            $this->line('<fg=gray>No emails to process.</>'); // Mensaje en rojo
            return 1;
        }

        $this->line('<fg=blue>Found ' . $emails->count() . ' emails to process...</>'); // Mensaje dinámicoamarillo
        $this->line('<fg=yellow>Processing emails...</>'); // Mensaje dinámicoamarillo

        $emails->each(function (Email $email) {
            SendEmail::dispatch($email)->onQueue('emails');
        });

        $this->info('Emails have been processed and sent saccessfully.');
    }
}
