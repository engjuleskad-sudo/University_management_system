<?php 
require_once __DIR__ . '/../Models/Student.php';
require_once __DIR__ . '/../Models/University.php';

class StudentController
{
    public function index()
    {
        $model=new Student();

        $students=$model->all();

        require_once __DIR__ . '/../Views/students/index.php';
    }
    public function create()
    {
        $universityModel=new University();


        $universities = $universityModel->getAll();

        require_once __DIR__ . '/../Views/students/create.php';
    }
    public function store()
    {
        $model=new Student();
        $photo=null;
        if(isset($_FILES['photo'])&& $_FILES['photo']['error']==0){
            $filename=time() . "_" . basename($_FILES['photo']['name']);

            $uploadPath= __DIR__ . "/../../public/assets/uploads/students/" .$filename;
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)){
                $photo = $filename;

            }
            else{
                die("Failed to upload student photo");
            }
        }
        $_POST['photo']=$photo;
        $model->create($_POST);

        $_SESSION['success'] = "Student created successfully.";

        header("Location: ?page=students");
        exit;
    }
    public function show()
    {
        if(!isset($_GET['id']))
            {
                die("Student Not Found.");
            }
        $model=new Student();

        $student=$model->find($_GET['id']);

        require_once __DIR__ . '/../Views/students/show.php';
    }
    public function edit()
    {
        if(!isset($_GET['id'])){
            die("Student ID not found.");
        }
        $model=new student();
        $student= $model->find($_GET['id']);
        $universityModel=new university();
        $universities=$universityModel->getAll();

        require_once __DIR__ . '/../Views/students/edit.php';
    }
    public function update()
    {
        if(!isset($_GET['id'])){
            die("Student not found.");
        }

        $model=new student();
        //Get the existing stuent
        $student=$model->find($_GET['id']);
        if(!$student){
            die("Student not found");
        }
        //keep existing photo
        $photo=$student['photo'];

        //Check if new photo was uploaded
        if(isset($_FILES['photo'])&& $_FILES['photo']['error']==0){
            $filename=time(). "_" . basename($_FILES['photo']['name']);

            $uploadPath=__DIR__  . "/../../public/assets/uploads/students/" . $filename;

            if(move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)){
                $photo=$filename;

            }
            else{
                die("Failed to upload student photo");
            }
        }
        //add photo to POST data 
        $_POST['photo']=$photo;

        //Update student 
        $model->update($_GET['id'], $_POST);

        $_SESSION['success']= "Student updated successfully";
        header("Location: ?page=students");
        exit;

    }
   

}
