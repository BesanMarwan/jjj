<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function updateWeather(){
         $weather       =Weather::select('id','zip_code','temp')->first();
         $zip           =$weather->zip_code;
         $api_url       ='http://api.openweathermap.org/data/2.5/group?id='.$zip.'&type=accurate&mode=json&units=metric&appid=ad140e29c6af3e28bac8b341dcaaaf51&fbclid=IwAR2LnsiKI65Vt54dp-SK9-7ypunTr1xJoj4GFF_HBNdZ1_A1gK5gBzhwezM';
         $response      =Http::get($api_url);
         $data          =json_decode($response,true);
         $weather->temp =$data['list'][0]['main']['temp'];
         $weather->update();
    }
}
