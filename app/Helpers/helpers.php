<?php

namespace App\Helpers;

class Helper
{

    // method for gretting
    public static function greet($name)
    {
        return "Hello, " . $name;
    }

    // method for
    public static function stringToNumeric($str) {
        // Check if it's in - format
       if (strpos($str, '-') !== false) {
           $num = 0;
       }
       // Check if it's in million format
       if (strpos($str, 'M') !== false) {
           $num = floatval(str_replace('M', '', $str)) * 1000000;
       }
       // Check if it's in thousand format
       elseif (strpos($str, 'k') !== false) {
           $num = floatval(str_replace('k', '', $str)) * 1000;
       }
       // If it's a regular number
       else {
           $num = floatval($str);
       }
       return $num;
   }


}
