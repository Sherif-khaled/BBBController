<?php


namespace BBBController\Helpers;


class CMD
{
    public static function deleteRecord($meetingID){
        #bbb-record --delete <meetingID>
        $exec = "echo 16121987 | /usr/bin/sudo -S rm -r test";
        exec($exec,$out,$rcode);
        return $rcode;

    }
    public static function deleteAllRecord(){
        #bbb-record --deleteall

    }

}