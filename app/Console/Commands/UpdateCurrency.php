<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:transfer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update Currency Transfer every daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        (new \App\Http\Controllers\Front\CurrencyController())->updateCurrency();
    }
}
