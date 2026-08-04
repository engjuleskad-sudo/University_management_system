<?php require_once __DIR__ . '/../Models/Student.php'; 

class StudentController
{
    public function index()
    {
        $model=new student();

        $students=$model->all();

        require_once __DIR__ . '/../Views/students//index.php';
    }

}
