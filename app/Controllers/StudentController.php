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
        $_POST['photo']=null;
        $model->create($_POST);

        $_SESSION['success'] = "Student created successfully.";

        header("Location: ?page=students");
        exit;
    }


}
