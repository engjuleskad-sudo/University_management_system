<?php



require_once __DIR__ . '/../../config/database.php';


class University
{
    private PDO $db;


    public function __construct()
    {
        $database= new Database();
        $this->db=$database->connect();


    }
    public function all()
    {
        $stmt=$this->db->query("SELECT * FROM universities ORDER BY id DESC");

      

        return $stmt->fetchAll();
    }
    

    public function find($id)
    {
        $stmt=$this->db->prepare(
            "SELECT * FROM universities WHERE id= :id"
        );
        $stmt->execute([
            'id' =>$id 
        ]);
        return $stmt->fetch();
    }
    public function create($data)
    {
        $sql="INSERT INTO universities 
        (
        name,
        short_name,
        email,
        phone,
        website,
        country,
        province,
        city,
        address
        )
        VALUES(
        :name,
        :short_name,
        :email,
        :phone,
        :website,
        :country,
        :province,
        :city,
        :address
        )";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([
            'name'=>$data['name'],
            'short_name'=>$data['short_name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'website'=>$data['website'],
            'country'=>$data['country'],
            'province'=>$data['province'],
            'city'=>$data['city'],
            'address'=>$data['address']
        ]);
    }

    public function update($id,$data)
    {
        $sql= "UPDATE universities SET
        name= :name,
        short_name= :short_name,
        email= :email,
        phone= :phone,
        website= :website,
        country= :country,
        province= :province,
        city= :city,
        address= :address

        WHERE id= :id";

        $stmt= $this->db->prepare($sql);

        return $stmt->execute([
            'id' =>$id,
            'name' =>$data['name'],
            'short_name' =>$data['short_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'country' => $data['country'],
            'province' => $data['province'],
            'city' => $data['city'],
            'address' => $data['address']
        ]);
    }
    public function deactivate($id)
    {
        $stmt=$this->db->prepare(
            "UPDATE universities SET status='Inactive' WHERE id= :id"
        );

        return $stmt ->execute([
            'id' => $id
        ]);
    }
   
    public function activate($id)
    {
        $stmt=$this->db->prepare(
            "UPDATE universities 
            SET status ='Active'
            WHERE id= :id"
        );
        return $stmt->execute([
            'id' =>$id
        ]);
    }
    public function search($keyword)
    {
        $stmt=$this->db->prepare(
            "SELECT * FROM universities
            WHERE name LIKE :keyword
            OR short_name LIKE :keyword
            ORDER BY id DESC"
        );
        $stmt->execute([
            'keyword' => '%' . $keyword . '%'

        ]);
        return $stmt->fetchAll();
    }

   
}

?>