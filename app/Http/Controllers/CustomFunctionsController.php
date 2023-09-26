<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomFunctionsController extends Controller
{
    function minutesToHours($minutes)
    {
        if ($minutes < 60) {
            return $minutes . ' menit';
        } else {
            $hours = floor($minutes / 60);
            $minuteRemainder = $minutes % 60;
            $hourStr = $hours . ' jam';
            $minuteStr = ($minuteRemainder > 0) ? ' ' . $minuteRemainder . ' menit' : '';

            return $hourStr . $minuteStr;
        }
    }

    public function rupiahFormat($amount)
    {
        $formatted_amount = number_format($amount, 0, ',', '.');

        return $formatted_amount;
    }
}