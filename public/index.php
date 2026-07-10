<?php



error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();


require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/App.php';

try{

$database= new Database();
$database->connect();

$app=new App();
$app->run();


}catch(Exception $e){
    echo "<h2>Applicatio Error!</h2>";
    echo $e->getMessage();

    
}
?>