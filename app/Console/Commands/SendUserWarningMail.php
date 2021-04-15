<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Provider;
use App\Notifications\WarningUser;
use Mail;

class SendUserWarningMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:warninguser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify an user that a provider\'s subscription must be renewed.';

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
     * @return int
     */
    public function handle()
    {
        $today = now();
        $closeDate = date("d-m-Y", strtotime("+7 days", strtotime(date("Y/m/d"))));
        $providers = Provider::where('end_date', '>', $today)->get();

        foreach($providers as $provider) {
            if($provider->end_date == $closeDate) {
                Mail::send('mail.warning_user',array(
                    'provider' => $provider,
                ), function($message) use ($provider){
                    $message->from(env('MAIL_FROM_ADDRESS'), 'Atouts Services');
                    $message->to($provider->user->email)->subject('Renouvellement abonnement Atouts services');
                });
            }
        }     

    }
}
