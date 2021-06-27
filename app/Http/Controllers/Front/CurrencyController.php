<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function updateCurrency(){
//        $currency = array('USD','JOD','EGP','SAR','EUR');
            $currency       =Currency::all();
        foreach($currency as $c) {
            $currency_api='https://free.currencyconverterapi.com/api/v5/convert?q='.$c->currency.'_ILS&compact=ultra&apiKey=050c75ac954294fa4d97';
             $json             = Http::get($currency_api);
             $data             = json_decode($json,true);
             $c->equivalentILS = round($data[$c->currency.'_ILS'],2);
             $c->update();
        }

    }

}
