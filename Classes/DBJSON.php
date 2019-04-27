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
        $results = array();
        $explodes = explode(PHP_EOL, file_get_contents($this->file));
        array_pop($explodes);

        foreach($explodes as $explode) {
            $results[] = json_decode($explode, true);
        }

        return $results;
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