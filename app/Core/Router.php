<?php
require_once __DIR__ . '/../Controllers/AuthController.php';

class Router 
{
    public function dispatch(): void 
    {
       

        $page=$_GET['page'] ??'login';

        switch($page){
            case 'login':

                $controller=new AuthController();
               if($_SERVER['REQUEST_METHOD']=== 'POST')
                {
                    $controller->login();
                }
                else{
                    $controller->showLogin();
                }

                break;

            case 'dashboard':
                require_once __DIR__ . '/../Views/dashboard.php';
                
                break;
        }
        
    }
 }


?>