<?php

use Illuminate\Database\Seeder;
use App\Models\Weather;

class WeatherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Weather::create(['city_name'=>'Jerusalem','zip_code'=>7303419 ,'temp'=>14.4]);
    }
}
