<?php

namespace App;

class Database
{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "dblearn";
    public  $dbconnection;

    public function __construct()
    {
        if (!isset($this->dbconnection)) {
            $this->dbconnection = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);
        }

            return $this->dbconnection;
    }


    public function db_create()
    {
        $db_connect = mysqli_connect($this->host, $this->user, $this->password);
        $sql = "CREATE DATABASE $this->dbname";
        if (mysqli_query($db_connect, $sql)) {

            echo 'database create successfully';
        } else {
            echo ' database not create';
        }
    }

    public function db_table_create()
    {

        $table_sql = "CREATE TABLE search ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, text VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL )";

        if (mysqli_query($this->dbconnection, $table_sql)) {
            echo "table created successfully";
        } else {
            echo "table create failed";
        }
    }




    public function insertText( $data){
        $text= $data['text'];
        $status = $data['status'];

        $query = "INSERT INTO `search`(`text`, `status`) VALUES ('$text','$status')";

        $result= mysqli_query($this->dbconnection, $query);

        return $result;
    }



    public function searchData($data){
        $text= $data['text'];

        $query=    "SELECT * FROM `search` WHERE `text` LIKE '%$text%' and `status`=1";

        $result= mysqli_query($this->dbconnection, $query);
        return $result;
    }
}
