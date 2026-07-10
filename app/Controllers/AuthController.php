<?php
require_once __DIR__ . '/../Models/User.php';

class AuthController 
{
    public function showLogin(): void 
    {
        require_once __DIR__ . '/../Views/auth/login.php';
    }


public function login(): void 
{
    $email=trim($_POST['email']);
    $password=$_POST['password'];


    $userModel=new User();

    $user=$userModel->findByEmail($email);

    if(!$user)
        {
            die("User not Found!");
        }

        if(!password_verify($password, $user['password'])){
            die("Incorrect password!");


        }

        $_SESSION['user_id']=$user['id'];
        $_SESSION['first_name']=$user['first_name'];
        $_SESSION['last_name']=$user['last_name'];
        $_SESSION['role_id']=$user['role_id'];
        $_SESSION['university_id']=$user['university_id'];

        header("Location: ?page=dashboard");

        exit;

}
}
?>
