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
   public function search($search = '', $university_id = '', $status = '', $limit = 10, $offset = 0)
{
    $sql = "SELECT students.*, universities.name AS university_name
            FROM students
            JOIN universities
            ON students.university_id = universities.id
            WHERE 1=1";

    $params = [];

    // Search
    if (!empty($search)) {

        $sql .= " AND (
            students.registration_number LIKE :search1
            OR students.first_name LIKE :search2
            OR students.last_name LIKE :search3
            OR students.email LIKE :search4
        )";

        $searchValue = "%" . $search . "%";

        $params['search1'] = $searchValue;
        $params['search2'] = $searchValue;
        $params['search3'] = $searchValue;
        $params['search4'] = $searchValue;
    }

    // University filter
    if (!empty($university_id)) {

        $sql .= " AND students.university_id = :university_id";

        $params['university_id'] = $university_id;
    }

    // Status filter
    if (!empty($status)) {

        $sql .= " AND students.status = :status";

        $params['status'] = $status;
    }

    // Pagination
    $limit = (int) $limit;
    $offset = (int) $offset;

    if ($limit < 1) {
        $limit = 10;
    }

    if ($offset < 0) {
        $offset = 0;
    }

    $sql .= " ORDER BY students.id DESC";
    $sql .= " LIMIT " . $limit . " OFFSET " . $offset;

    // Prepare
    $stmt = $this->db->prepare($sql);

    // Execute only the parameters that actually exist in the SQL
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function countSearch($search='', $university_id='', $status='')
    {
        $sql="SELECT COUNT(*)
        FROM students
        JOIN universities
        ON students.university_id = universities.id
        WHERE 1=1";

        $params=[];
        //Search
        if(!empty($search)){
            $sql .= " AND (
            students.registration_number LIKE :search1
            OR students.first_name LIKE :search2
            OR students.last_name LIKE :search3
            OR students.email LIKE :search4
            )";

            $searchValue="%" . $search . "%";

            $params['search1']=$searchValue;
            $params['search2']=$searchValue;
            $params['search3']=$searchValue;
            $params['search4']=$searchValue;


        }
        //University Filter
        if(!empty($university_id)){
            $sql .=" AND students.university_id= :university_id";

            $params['university_id']= $university_id;
        }
        //status filter
        if(!empty($status)){
            $sql .=" AND students.status= :status";

            $params['status']=$status;
        }
        $stmt=$this->db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchColumn(); 
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
    public function update($id, $data)
    {
        $sql= "UPDATE students SET 
        university_id = :university_id,
        registration_number= :registration_number,
        first_name= :first_name,
        last_name= :last_name,
        gender= :gender,
        date_of_birth= :date_of_birth,
        email= :email,
        phone= :phone,
        photo= :photo,
        country= :country,
        province= :province,
        city= :city,
        address= :address

        WHERE id= :id";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([
            'university_id'=> $data['university_id'],
            'registration_number'=> $data['registration_number'],
            'first_name'=> $data['first_name'],
            'last_name' =>$data['last_name'],
            'gender' =>$data['gender'],
            'date_of_birth' =>$data['date_of_birth'],
            'email' =>$data['email'],
            'phone' =>$data['phone'],
            'photo' =>$data['photo'],
            'country' =>$data['country'],
            'province' =>$data['province'],
            'city' =>$data['city'],
            'address' =>$data['address'],
            'id' =>$id 
        ]);
}
 
   public function deactivate($id)
   {
    $sql="UPDATE students
     SET status='Inactive '
     WHERE id= :id ";

     $stmt=$this->db->prepare($sql);

     return $stmt->execute([
        'id' => $id
     ]);

   }
   public function activate($id)
   {
    $sql="UPDATE students
    SET status='Active'
    WHERE id= :id";

    $stmt=$this->db->prepare($sql);

    return $stmt->execute([
        'id' => $id
    ]);
   }


}
