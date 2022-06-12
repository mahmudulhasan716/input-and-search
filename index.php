<?php

require_once 'vendor/autoload.php';

use App\Database;

$con= new Database();

if(isset($_POST['create_database'])){
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname= "test";
    $sql = "CREATE DATABASE $dbname";

    $conn = new mysqli($host, $username, $password);

    if (mysqli_query($conn, $sql)){
        
       
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname= "test";
    
            $table_conn = mysqli_connect($host, $username, $password, $dbname);
    
            $table_sql= "CREATE TABLE search ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, text VARCHAR(30) NOT NULL, status TINYINT(1) NOT NULL )";
    
            if (mysqli_query($table_conn, $table_sql)) {
                echo " created successfully";
              } else{
                echo "table create failed";
              }

    }else{
        echo 'create failed';
    }
}




if(isset($_POST['submit'])){
    $text = $_POST['text'];
    $status = $_POST['status'];

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
    <h2>database connection</h2>
    <form method="post">
        <input type="submit" name="create_database" value="Create Database">
    </form>



    <h2> Insert Data</h2>
    <form method="post">
        <input type="text" name="text" placeholder="input your text here" >
        <select name="status">
            <option value=""> select </option>
            <option value="1"> active</option>
            <option value="0"> inactive </option>
        </select>
        <input type="submit" name="submit">
    </form>

    <h2> search data</h2>
    <form method="get">
        <input type="text" name="text" placeholder="search data " >
        <input type="submit" name="submit">
    </form>
</body>
</html>