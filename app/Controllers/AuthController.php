<?php
require_once __DIR__ . '/../Core/Controller.php';

class AuthController extends Controller 
{
    public function login(): void 
    {
        $this->view('auth/login');
    }

}
?>