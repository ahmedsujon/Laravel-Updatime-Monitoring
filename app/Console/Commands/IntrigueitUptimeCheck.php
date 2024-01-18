<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Monitor;
use Illuminate\Console\Command;
use App\Mail\DowntimeNotification;
use Illuminate\Support\Facades\Mail;

class IntrigueitUptimeCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'intrigueit:uptime-check';

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
        $downDomains = Monitor::where('uptime_status', 'down')->get();
        foreach ($downDomains as $domain) {
            $domainData['url'] = $domain->url;
            Mail::send('emails.downtimenotify', $domainData, function ($message) use ($domainData) {
                $message->to('gearinsane@gmail.com')
                    ->subject('Downtime Notification!');
            });
        }
    }
}
