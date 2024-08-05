<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;
use App\Events\UserLoggedOut;
use App\Models\Customer;



Schedule::call(function () {
    DB::table('customers')->create();
})->daily();
 
Schedule::call(function(){
    DB::table('customers')->command('cache:clear')->everyMinute();	
});

Schedule::call(function(){
    DB::table('customers')->where('mrp')->command('mrp:increment')->everyMinute();	
});
    // Run the MRP increment command daily at midnight

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
