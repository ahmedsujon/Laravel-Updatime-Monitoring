<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ExpiryDomainCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'intrigueit:expiry-domain-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info('Expiry Domain Check');
        // $expiredomains = DB::table('monitors')->pluck('domain_expiry_date');
        // foreach ($expiredomains as $date) {
        //     $dateTime = Carbon::parse($date);
        //     $now = Carbon::now();
        //     $daysLeft = $now->diffInDays($dateTime);

        //     if ($daysLeft < 30) {
        //         Mail::send('emails.expiredomainnotify', $daysLeft, function ($message) use ($daysLeft, $date) {
        //             $message->to('gearinsane@gmail.com')
        //                 ->subject('Domain Expiry Notification!');
        //         });
        //     }
        // }
    }
}
