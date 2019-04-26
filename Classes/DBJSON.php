<?php

class DBJSON extends Database
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function save($userArray)
    {
        $user = json_encode($userArray);
        file_put_contents($this->file, $user . PHP_EOL, FILE_APPEND);
    }

    public function update()
    {
        
    }

    public function delete()
    {

    }

    public function read()
    {

    }


    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }
}