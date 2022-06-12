<?php

namespace App;
use App\Dbcon;


class Database{

   public function Savetext($data) {
     $text= $data['text'];
     $status = $data['status'];
     $query = "INSERT INTO `search`(`text`,`status`) VALUES ('$text', '$status')";
     mysqli_query(Dbcon::dbcon(),$query);
   }

   public function Searchtext($data){
    $link= $data['text'];
    $query = "SELECT * FROM `search` WHERE `text` LIKE '%$link%' and `status`=1";
   $result= mysqli_query(Dbcon::dbcon(),$query);

    return $result;

  }


}