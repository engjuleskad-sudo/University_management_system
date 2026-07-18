<?php
 require_once __DIR__ . '/../Models/University.php';

 class UniversityController
 {
    public function index()
    // {
    //      die("University Controller Works!");
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

    public function edit()
    {
        $model= new University();

        $university= $model->find($_GET['id']);

        require_once __DIR__ . '/../Views/universities/edit.php';
    }

    public function update()
    {
        $model= new University();

        $model->update($_GET['id'], $_POST);

        header("Location: ?page=universities");

        exit;
    }
 }
?>