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
    public function create($data)
    {
        $sql="INSERT INTO students
        (
        university_id,
        registration_number,
        first_name,
        last_name,
        gender,
        date_of_birth,
        email,
        phone,
        photo,
        country,
        province,
        city,
        address
        )
        VALUES 
        (
        :university_id,
        :registration_number,
        :first_name,
        :last_name,
        :gender,
        :date_of_birth,
        :email,
        :phone,
        :photo,
        :country,
        :province,
        :city,
        :address
        )";
        $stmt=$this->db->prepare($sql);

        return $stmt->execute([
            'university_id' => $data['university_id'],
            'registration_number' => $data['registration_number'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'photo' => $data['photo'],
            'country' => $data['country'],
            'province' => $data['province'],
            'city' => $data['city'],
            'address' => $data['address']
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
   
}
}
