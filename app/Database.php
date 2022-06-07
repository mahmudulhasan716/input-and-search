<?php

namespace App;

class Database{

   public function __construct()
   {
    $this->link =  mysqli_connect('localhost','root','','test');
   }


   public function Savetext($data){
     $text= $data['text'];
     $query = "INSERT INTO `search`(`text`) VALUES ('$text')";
     mysqli_query($this->link,$query);

   }

   public function Searchtext($data){
    $link= $data['text'];
    $query = "SELECT * FROM `search` WHERE `text` LIKE '%$link%'";
   $result= mysqli_query($this->link,$query);

    return $result;

  }


}