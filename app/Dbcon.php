<?php

namespace App;

class Dbcon{
    public function dbcon(){

        $host= "localhost";
        $user="root";
        $password="";
        $db="test";

        $link= mysqli_connect( $host,$user,$password,$db);
        return $link;

    }
}