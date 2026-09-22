<?php
require_once __DIR__ . '/../Models/Lecturer.php';
require_once __DIR__ . '/../Models/University.php';

class LecturerController
{
    public function index()
    {
        $model = new Lecturer();
        $lecturers = $model->all();

        require_once __DIR__ . '/../Views/lecturers/index.php';
    }
    public function create()
    {
        $universityModel= new University();

        $universities= $universityModel->getAll();

        require_once __DIR__ . '/../Views/lecturers/create.php';
    }
    public function store()
    {
       $data=$_POST;

       //Handle lecturer photo
       if(isset($_FILES['photo']) && $_FILES['photo']['error']===0){
        $uploadDir= __DIR__ ."/../../public/assets/uploads/lecturers/";

        //Create folder if it does not exist
        if(!is_dir($uploadDir)){
            mkdir($uploadDir,0777,true);
        }
        //Generate unique filename
        $fileName= time() . "_" . basename($_FILES['photo']['name']);

        $uploadPath = $uploadDir . $fileName;

        //move uploaded files 
        if(move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)){
            $data['photo']=$fileName;

    

        }
        else{
            $data['photo']=null;
        }
       

       }
        else{
            $data['photo']=null;

        }
        $model=new Lecturer();
        $model->create($data);

        
        header("Location: ?page=lecturers");
        exit;
    }
    public function show(){
        if(!isset($_GET['id'])){
            header("Location: ?page=lecturers");
            exit;
        }
        $model=new Lecturer();

        $lecturer=$model->find($_GET['id']);
        if(!$lecturer){
            header("Location: ?page=lecturers");
            exit;

        }
        require_once __DIR__ . '/../Views/lecturers/show.php';
    }
}