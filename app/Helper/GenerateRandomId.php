<?php

namespace App\Helper;

class GenerateRandomId
{
   public static function generate($symbol, $length = 10)
   {
        $alphanum_chars = array_merge(range(0, 9), range('a', 'z'));
        $rand_chars = [];

        while(sizeof($rand_chars) < $length) {
            array_push($rand_chars, $alphanum_chars[random_int(0, sizeof($alphanum_chars) )]);
        }

        return $symbol . implode($rand_chars);
   }
}