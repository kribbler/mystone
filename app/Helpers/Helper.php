<?php

namespace App\Helpers;

use DateTime;

class Helper
{

    public static function displayDate($date)
    {
        if(!$date) {
            return '';
        }
        $converted = new DateTime($date);
        return $converted->format('d/m/Y');
    }

    public static function displayGBP($total)
    {
        return '£' . number_format($total, 2, '.', ',');
    }

}
