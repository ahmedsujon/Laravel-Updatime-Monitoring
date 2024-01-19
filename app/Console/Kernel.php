<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('monitor:check-uptime')->everyTenMinutes();
        $schedule->command('monitor:check-certificate')->everyTenMinutes();
        $schedule->command('intrigueit:uptime-check')->everyTenMinutes();
        $schedule->command('intrigueit:expiry-domain-check')->everyTenMinutes();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
