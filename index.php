<?php

require_once 'vendor/autoload.php';

use App\Database;

$con= new Database();



if(isset($_POST['submit'])){
    $text = $_POST['text'];

    echo $con->Savetext($_POST);

}


if(isset($_GET['submit'])){
    $search = $_GET['text'];

    $search= $con->Searchtext($_GET);


    while($row= mysqli_fetch_assoc($search)){
         echo $row['text'];
     }  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> Insert Data</h2>
    <form method="post">
        <input type="text" name="search" placeholder="input your text here" >
        <input type="submit" name="submit">
    </form>

    <h2> search data</h2>
    <form method="get">
        <input type="text" name="text" placeholder="search data " >
        <input type="submit" name="submit">
    </form>
</body>
</html>