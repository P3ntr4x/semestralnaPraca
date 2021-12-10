<?php
require "Blog.php";
require "IStorage.php";
require "DBStorage.php";


class App
{
    private $storage;


    public function __construct()
    {
        $this->storage = new DBStorage();

        if (isset($_POST['poslat']))
        {
            $this->storage->store(new Blog($_POST['nazov'], $_POST['text'], date('Y-m-d H:i:s')));
        }
    }

    public function getAllData()
    {
        return $this->storage->getAllData();
    }
}