<?php

namespace App\Console\Commands;

use App\Http\Controllers\Front\WeatherController;
use App\Models\Weather;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:updateTemp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update weather Temperature every daily';

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
        (new \App\Http\Controllers\Front\WeatherController)->updateWeather();
    }
}
