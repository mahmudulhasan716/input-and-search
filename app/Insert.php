<?php

namespace App;

use App\Database;



class Insert
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function insert($data)
    {
        $result = $this->database->insertText($data);

        return $result;
    }
}
