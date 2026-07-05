<?php
// require_once  __DIR__  . '/../config/database.php';

// try{
//     $database=new Database();
//     $connection=$database->connect();
//     echo "<h1>University Management System</h1>";
//     echo "<p>✅ Database Connected Successfuly!</p>";

// }
// catch(Exception $e){
//     echo "<h2>Connection Failed!</h2>";

//     echo $e->getMessage();
// }


require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/App.php';

try{

$database= new database();
$database->connect();

$app=new App();
$app->run();


}catch(Exception $e){
    echo "<h2>Applicatio Error!</h2>";
    echo $e->getMessage();

    
}
?>