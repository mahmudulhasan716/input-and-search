<?php
namespace App;

use App\Database;

class Search
{
    public function __construct()
    {
        $this->database = new Database();
    }


    public function search($data)
    {
        $result = $this->database->searchData($data);

        while ($row= mysqli_fetch_assoc($result)) {
            echo $row['text'];
        }
    }
}
