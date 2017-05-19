<?php

namespace App\Console;

use App\Productor;
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
        //
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
        $schedule->call(function () {
            //DB::table('recent_users')->delete();
            $Productor = new Productor();
            $Productor->codigo = "001";

            $Productor->nombre = "Cesar";
            $Productor->fecha_nacimiento = date("Y-m-d");
            $Productor->telefono = "789456123";
            $Productor->direccion = "Cl. Lima 3543";
            
            //$Productor->url = str_slug($request->input("name"));
            $Productor->save();
        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
