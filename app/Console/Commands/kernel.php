<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Schedule;
class kernel extends Command
{


 
    
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kernel';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    protected function schedule($schedule)
    {
        // Run the MRP increment command daily at midnight
        $schedule->command('mrp:increment')->everyMinute();
    }
    public function handle()
    {
        //   
    }
}
