<?php
namespace App\Http\Helpers;

class  Helper {
    public static function interval($date)
    {
        $dateNow = now();
        $dateCreated = date($date->created_at);
        $dateDifference = ($dateNow->diff($dateCreated));
        $year = $dateDifference->format("%Y");
        $month = $dateDifference->format("%m");
        $day = $dateDifference->format("%d");
        $hours = $dateDifference->format("%H");
        $minut = $dateDifference->format("%i");
        $second = $dateDifference->format("%s");
    
        $interval = "Przed chwilą";
        if ($year != 0) {
            if ($year == 1) {
                $interval = "Rok temu";
            } else {
                $interval = $year . " lata temu";
            }
        } else if ($month != 0) {
            if ($month == 1) {
                $interval = "Miesiąc temu";
            } else {
                $interval = $month . " miesiące temu";
            }
        } else if ($day != 0) {
            if ($day == 1) {
                $interval = "Wczoraj";
            } else {
                $interval = $day . " dni temu";
            }
        } else if ($hours != 0) {
            if ($hours == 1) {
                $interval = "Godzinę temu";
            } else if ($hours == 2 || $hours == 3 || $hours == 4) {
                $interval = $hours . " godziny temu";
            } else {
                $interval = $hours . " godziny temu";
            }
        } else if ($minut != 0) {
            if ($minut == 1) {
                $interval = "Minute temu";
            } else if ($minut < 10 && $minut != 1) {
                $interval = $minut . " minuty temy";
            } else {
                $interval = $minut . " minut temu";
            }
        } else if ($second != 0) {
            if ($second == 1) {
                $interval = "Sekunde temu";
            } else {
                $interval = $second . " sekund temu";
            }
        }
        return $interval;
    }
}





