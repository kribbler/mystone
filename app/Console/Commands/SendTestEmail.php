<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Mailer;

class SendTestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test e-mail.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $to_email = $this->anticipate('Who would you like to send the e-mail to?', ['rhuaridh.clark@qanw.co.uk', 'daniel.oraca@qanw.co.uk']);
        $success = Mailer::sendMail([
            'to' => [$to_email => $to_email],
        ]);
        if($success) {
            $this->info('Test e-mail sent to ' . $to_email . '!');
        } else {
            $this->error('Oops! Could not send test e-mail. Please check the logs for further information.');
        }
    }
}
