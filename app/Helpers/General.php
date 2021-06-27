<?php
use Illuminate\Support\Facades\Config;
use Spatie\Valuestore\Valuestore;


 function uploadImage($folder, $image){
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}
function getSettingsOf($key) {
    $settings = Valuestore::make(config_path('settings.json'));
    return $settings->get($key);
}
function ControlText($string){
        return strlen($string)>200 ? substr($string,0,500): $string;
//          return explode('.',$string,0);
}
function getDateArabic($date){
    switch($date){
        case ('Saturday') : $date="السبت";
                           break;
        case ('Sunday') : $date="الاحد";
                         break;
        case('Monday') : $date="الاتنين";
                          break;
        case ('Tuesday') : $date="الثلاثاء";
                            break;
        case ('Wednesday') : $date="الاربعاء";
                            break;
        case ('Thursday') : $date="الخميس";
            break;
        case ('Friday') : $date="الجمعة";
            break;


    }
    return $date;

}
// Highlight words in text
function highlightWords($text, $word){
    $text = preg_replace('#'. preg_quote($word) .'#i', '<span class="" style="background:#F2D41F;color:#114379;font-size:18.5px;">\\0</span>', $text);
    return $text;
}





?>
