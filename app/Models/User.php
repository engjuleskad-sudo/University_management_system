<?php
require_once __DIR__ . '/../../config/database.php';

class User 
{
    private PDO $db;

    public function __construct()
    {
        $database=new Database();
        $this->db= $database->connect();

    }
    public function findByEmail(string $email): ?array 
    {
        $sql="SELECT * FROM users WHERE email= :email LIMIT 1";
        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            'email' =>$email
        ]);
        $user=$stmt->fetch();

        return $user ?: null;
    }
}
?>