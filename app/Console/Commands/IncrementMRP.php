<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class IncrementMRP extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mrp:increment {amount=2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increment the MRP of products by a specified amount';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $amount = (int) $this->argument('amount');

        // Increment MRP for all customers (or filter as needed)
        Customer::query()->update(['mrp' => DB::raw("mrp + $amount")]);

        $this->info("MRP incremented by $amount successfully.");
    }
}
