<?php

namespace App\Console;

use App\Console\Cart\AddCommand;
use App\Console\Cart\CheckoutCommand;
use App\Console\Cart\EndCommand;
use App\Console\Cart\RemoveCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        AddCommand::class,
        RemoveCommand::class,
        EndCommand::class,
        CheckoutCommand::class,
        \App\Console\Inventory\AddCommand::class,
        \App\Console\Inventory\EndCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
