<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table='Currency';
    protected $guarded=[];
    public $timestamps = true;

    public function getCurrency($currency){
        switch($currency){
            case('USD'): $currency='دولار أمريكي';
                         break;
            case('JOD'): $currency='دينار أردني';
                         break;
            case('EUR'): $currency='يورو';
                         break;
            case('EGP'): $currency='جنيه مصري';
                         break;
            case('SAR'): $currency='ريال سعودي';
                         break;
        }
        return $currency;
    }


}
