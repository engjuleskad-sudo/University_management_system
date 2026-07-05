<?php
require_once  __DIR__  . '/../config/database.php';

try{
    $database=new Database();
    $connection=$database->connect();
    echo "<h1>University Management System</h1>";
    echo "<p>✅ Database Connected Successfuly!</p>";

}
catch(Exception $e){
    echo "<h2>Connection Failed!</h2>";

    echo $e->getMessage();
}
?>