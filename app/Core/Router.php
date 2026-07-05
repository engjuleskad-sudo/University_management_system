<?php
require_once __DIR__ . '/../Controllers/AuthController.php';

class Router 
{
    public function dispatch(): void 
    {
        $url=$_GET['url'] ?? 'login';

        switch($url){
            case 'login':
                $controller = new AuthController();
                $controller->login();
                break;


                default:
                echo "<h2>404 Page Not Found</h2>";
        }
    }
}

?>