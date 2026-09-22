<?php
require_once __DIR__ . '/../Models/User.php';

class AuthController 
{
    public function showLogin(): void 
    {
        require_once __DIR__ . '/../Views/auth/login.php';
    }


// public function login(): void 
// {
//     $email=trim($_POST['email']);
//     $password=$_POST['password'];


//     $userModel=new User();

//     $user=$userModel->findByEmail($email);
//  $testHash = password_hash('Admin@123', PASSWORD_DEFAULT);
// var_dump([
//     'db_hash_hex' => bin2hex($user['password']),
//     'literal_hash_hex' => bin2hex('$2y$10$PoLw/bCEq0P2Eo6UQQ8nJugYFTVW8V4TVy6W/D4QMNFrA.ekTJUjq'),
//     'same_bytes' => $user['password'] === '$2y$10$PoLw/bCEq0P2Eo6UQQ8nJugYFTVW8V4TVy6W/D4QMNFrA.ekTJUjq'
// ]);

// exit;

// exit;
//     if(!$user)
//         {
//             die("User not Found!");
//         }

//         if(!password_verify($password, $user['password'])){
//             die("Incorrect password!");


//         }

//         $_SESSION['user_id']=$user['id'];
//         $_SESSION['first_name']=$user['first_name'];
//         $_SESSION['last_name']=$user['last_name'];
//         $_SESSION['role_id']=$user['role_id'];
//         $_SESSION['university_id']=$user['university_id'];

//         header("Location: ?page=dashboard");

//         exit;

// }
public function login(): void 
{
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $userModel = new User();

    $user = $userModel->findByEmail($email);

    if (!$user) {
        die("User not Found!");
    }

    if (!password_verify($password, $user['password'])) {
        die("Incorrect password!");
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    $_SESSION['role_id'] = $user['role_id'];
    $_SESSION['university_id'] = $user['university_id'];

    header("Location: ?page=dashboard");

    exit;
}
}
?>
