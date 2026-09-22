
<?php
class Lecturer
{
    private PDO $db;

    public function __construct()
    {
        $database = new Database();
        $this->db= $database->connect();
    }

    //Get all the lecturers
    public function all()
    {
        $sql= "SELECT lecturers.*, universities.name AS university_name
        FROM lecturers
        JOIN universities
        ON lecturers.university_id=universities.id
        ORDER BY lecturers.id DESC";

        $stmt= $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function create($data)
    {
        $sql= "INSERT INTO lecturers(
        university_id,
        staff_number,
        first_name,
        last_name,
        gender,
        date_of_birth,
        email,
        phone,
        photo,
        department,
        specialization,
        qualification,
        employment_type,
        country,
        province,
        city,
        address
        ) VALUES (
        :university_id,
        :staff_number,
        :first_name,
        :last_name,
        :gender,
        :date_of_birth,
        :email,
        :phone,
        :photo,
        :department,
        :specialization,
        :qualification,
        :employment_type,
        :country,
        :province,
        :city,
        :address
        )";
        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            'university_id' => $data['university_id'],
            ':staff_number' => $data['staff_number'],
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':gender' => $data['gender'],
            ':date_of_birth' => !empty($data['date_of_birth']) 
                                ? $data['date_of_birth'] 
                                : null,

            ':email' => $data['email'],
            ':phone' => !empty($data['phone'])
                                    ? $data['phone']
                                    : null,
            'photo' => !empty($data['photo'])
                                    ?$data['photo']
                                    :null,

            ':department' => !empty($data['department'])
                                    ?$data['department']
                                    : null,
            ':specialization' => !empty($data['specialization'])
                                    ?$data['specialization']
                                    :null,
            ':qualification' => !empty($data['qualification'])
                                    ?$data['qualification']
                                    : null,
            ':employment_type' => !empty($data['employment_type'])
                                    ?$data['employment_type']
                                    : null,
            ':country' => !empty($data['country'])
                                    ?$data['country']
                                    : null,
            ':province' => !empty($data['province'])
                                    ?$data['province']
                                    : null,
            ':city' => !empty($data['city'])
                                    ?$data['city']
                                    : null,
            ':address' => !empty($data['address'])
                                    ?$data['address']
                                    : null
        ]);

    }
    public function find($id)
    {
        $sql="SELECT lecturers .*, universities.name AS university_name
        FROM lecturers
        JOIN universities
        ON lecturers.university_id= universities.id
        WHERE lecturers.id = :id";

        $stmt=$this->db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}