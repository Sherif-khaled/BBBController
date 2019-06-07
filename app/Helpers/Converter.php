<?php


namespace BBBController\Helpers;


class Converter
{
    public static function millisecondsToDate($milliseconds){

        $seconds = $milliseconds / 1000;
        $seconds = round($seconds);
        if($seconds > 82800){
            $date = date("d/m/Y H:i:s", $seconds);
        }
        else{
            $date = date("H:i:s", $seconds);
        }
        return $date;
    }

}