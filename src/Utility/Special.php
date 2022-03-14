<?php

namespace App\Utility;

class Special
{
    public static function escapeWord($string)
    {
        $array = array(
            '&' => '&#38;',
            '<' => '&#60;',
            '>' => '&#62;',
            '"' => '&#34;',
            "'" => '&#39;',
        );
 
        // bind all keys as an array 
        $keys = array_keys($array);

        for ($i = 0; $i < count($keys); ++$i) {
            $string = str_replace($keys[$i], $array[$keys[$i]], $string);
        }
        return $string;
    }
}
