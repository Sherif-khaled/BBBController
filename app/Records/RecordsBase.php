<?php


namespace BBBController\Records;


abstract class RecordsBase extends Database
{
    protected $DB_Path;
    protected $SSH = [];

    private function __construct()
    {

    }

}