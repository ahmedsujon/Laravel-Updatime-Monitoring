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
        dispatch(function () use ($downDomains) {
            foreach ($downDomains as $domain) {
                Mail::to('gearinsane@gmail.com')->send(new DowntimeNotification($domain->url));
            }
        });
        
        // info('Intrigueit Updatime Check');
    }
}
