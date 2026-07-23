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
        if(isset($_GET['search']) && !empty(trim($_GET['search']))){
            $universities = $model->search(trim($_GET['search']));
        }
        else{
            $universities=$model->all();
        }

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
        $_SESSION['success']="University Created Successfully.";

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
        $_SESSION['success']="University updated successfully.";

        header("Location: ?page=universities");

        exit;
    }

    public function deactivate()
    {
        if(!isset($_GET['id'])){
            die("University ID not found");
        }
        $model=new University();

        $model->deactivate($_GET['id']);
        $_SESSION['success']="University deactivated successfully.";

        header("Location: ?page=universities");
        exit;

        
    }
    public function activate()
    {
        if(!isset($_GET['id'])){
            die("University not found.");
        }
        $model=new University();

        $model->activate($_GET['id']);

        $_SESSION['success']="University activated successfully.";

        header("Location: ?page=universities");
    }
 }
?>