<?php

class Database
{
private string $host="localhost";
private string $database="ums_db";
private string $username="root";
private string $password="";

private ?PDO $connection=null;

public function connect(): PDO
    {
        if($this->connection===null){
            
            $dsn="mysql:host={$this->host};dbname={$this->database};charset=utf8mb4";
            $this->connection=new PDO(
                $dsn,
                $this->username,
                $this->password

            );
            $this->connection->setAttribute(
               PDO::ATTR_ERRMODE,
               PDO::ERRMODE_EXCEPTION
            );
            $this ->connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );
        }
        return $this->connection;
    }

}
?>