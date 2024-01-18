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
        $expiredomains = DB::table('monitors')->get();
        foreach ($expiredomains as $domain) {
            $dateTime = Carbon::parse($domain->domain_expiry_date);
            $now = Carbon::now();
            $daysLeft = $now->diffInDays($dateTime);
            $mailData['url'] = $domain->url;
            $mailData['daysLeft'] = $daysLeft;
            if ($daysLeft < 90) {
                Mail::send('emails.expiredomainnotify', $mailData, function ($message) use ($mailData) {
                    $message->to('gearinsane@gmail.com')
                        ->subject('Domain Expiry Notification!');
                });
            }
        }
    }
}
