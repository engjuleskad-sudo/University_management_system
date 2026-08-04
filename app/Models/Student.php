<?php require_once __DIR__ . '/../../config/database.php'; 

class Student
{
    private PDO $db;

    public function __construct()
    {
        $database=new Database();
        $this->db= $database->connect();
    }
    // get all students
    public function all()
    {
        $sql="SELECT students.*, universities.name AS university_name 
        FROM students 
        JOIN universities 
        ON students.university_id = universities.id
        ORDER BY students.id DESC";

        $stmt=$this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Find one student
    public function find($id)
    {
        $stmt=$this->db->prepare("
        SELECT students.*, universities.name AS university_name
        FROM students
        JOIN universities
        ON students.university_id = universities.id
        WHERE students.id = :id
        ");

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

