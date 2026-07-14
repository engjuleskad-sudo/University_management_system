<?php
require_once __DIR__ . '/../Controllers/AuthController.php';
require_once __DIR__ . '/../Controllers/UniversityController.php';

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
            case 'universities':
                $controller=new UniversityController();
                $controller->index();

                break;
            case 'add-university':
                $controller=new UniversityController();

                if($_SERVER['REQUEST_METHOD']=='POST')
                    {
                        $controller->store();
                    }
                    else{
                        $controller->create();

                    }
                    break;
             default:
                 echo "<h2>404 Page Not Foung</2>";
                     break;

        }
        
    }
 }


?>