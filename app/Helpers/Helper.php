<?php


namespace App\Helpers;
use Illuminate\Support\Str;

class Helper
{
    public static function formatPrice($price)
    {   
        $formatted_price = number_format($price,0,",",".");
        return $formatted_price;
    }

    public static function limitStr($str){
        $formatted_str = Str::limit($str, 10, '...');
        return $formatted_str;
    }

    public static function getDate($str){
        $date = explode(" ", $str);
        return $date[0];
    }

    public static function getTime($str){
        $date = explode(" ", $str);
        return $date[1];
    }

}