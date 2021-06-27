<?php

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create(['currency'=>'USD','equivalentILS'=>3.29]);
        Currency::create(['currency'=>'JOD','equivalentILS'=>4.64]);
        Currency::create(['currency'=>'EGP','equivalentILS'=>0.21]);
        Currency::create(['currency'=>'SAR','equivalentILS'=>0.88]);
        Currency::create(['currency'=>'EUR','equivalentILS'=>3.29]);
    }
}
