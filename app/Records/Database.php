<?php


namespace BBBController\Records;


abstract class Database
{
    protected $DB_Path;

    protected $SSH = [
        'server_ip' => '',
        'user_name' => '',
        'password' => '',
        'key_file' => ''
    ];

    protected $Records = [];

    private function __construct($DB_Path,?$SSH)
    {
        $this->DB_Path = base_path($DB_Path);

    }
    private function getAll(){
        $dir = new \DirectoryIterator($this->DB_Path);
        foreach ($dir as $fileinfo) {
            if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                array_push($this->Records,$dir->getFilename());
            }
        }
    }
    protected function delete($id){

    }
    protected function deleteAll($array){

    }
    protected function unpublished($id){

    }
    protected function published($id){

    }


}