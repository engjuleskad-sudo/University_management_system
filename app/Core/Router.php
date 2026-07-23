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
                if(!isset($_SESSION['user_id'])){
                    header("Location: ?page=login");

                    exit;
                }
                require_once __DIR__ . '/../Views/dashboard.php';
                
                break;
            case 'universities':
                if(!isset($_SESSION['user_id'])){
                    header("Location: ?page=login");
                    exit;
                }
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
             
            case 'edit-university':
                if(!isset($_SESSION['user_id'])){
                    header("Location: ?page=login");
                    exit;
                }
                $controller=new UniversityController();
                if($_SERVER['REQUEST_METHOD']==='POST'){
                    $controller->update();
                    
                }
                else{
                    $controller->edit();

                }
                break;
            case 'update-university':
                $controller=new UniversityController();
                $controller->update();

                break;
            case 'deactivate-university':
                if(!isset($_SESSION['user_id'])){
                    header("Location: ?page=login");
                    exit;
                }

                $controller=new UniversityController();
                $controller->deactivate();
                exit;
            case 'activate-university':
                if(!isset($_SESSION['user_id'])){
                    header("Location: ?page=login");
                    exit;
                }
                $controller=new UniversityController();
                $controller->activate();
                
                exit;

            default:
                 echo "<h2>404 Page Not Found!</h2>";
                     break;

        }
        
    }
 }

?>