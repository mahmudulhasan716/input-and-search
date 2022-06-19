<?php
require_once 'vendor/autoload.php';

use App\Database;
use App\Insert;
use App\Search;


$con = new Database();
$insert = new Insert();
$search = new Search();



if(isset($_POST['create_database'])){
    $result= $con->db_create();
}

if(isset($_POST['create_table_database'])){
    $result= $con->db_table_create();
}


if(isset($_POST['insert_text'])){

    $result= $insert->insert($_POST);

}


if(isset($_GET['search_data'])){
    $result= $search->search($_GET);
    
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

    <h2>database table connection</h2>
    <form method="post">
        <input type="submit" name="create_table_database" value="Create Database">
    </form>


    <h2> insert text</h2>
    <form method="post">
        <input type="text" name="text" placeholder="enter your text">
        <select name="status">
            <option value=""> select </option>
            <option value="1"> active</option>
            <option value="0"> inactive </option>
        </select>
        <input type="submit" name="insert_text" >
    </form>



    <h2> search data</h2>
    <form method="get">
        <input type="text" name="text" placeholder="search data " >
        <input type="submit" name="search_data">
    </form>


</body>
</html>