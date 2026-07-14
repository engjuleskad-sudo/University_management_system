<?php
 require_once __DIR__ . '/../Models/University.php';

 class UniversityController
 {
    public function index()
    // {
    //     echo "<h1>University Found</h1>";
    // }
    {

        $model=new University();

        $universities= $model->all();

        require_once __DIR__ . '/../Views/universities/index.php';
    }
    public function create()
    {
        require_once __DIR__ . '/../Views/universities/create.php';


    }
    public function store()
    {
        $model=new University();

        $model->create($_POST);

        header("Location: ?page=universities");
        
        exit;
    }
 }
?>