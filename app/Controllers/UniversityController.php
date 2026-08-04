<?php
 require_once __DIR__ . '/../Models/University.php';

 class UniversityController 
 {
    // public function index
   
    // {

    //     $model=new University();
    //     if(isset($_GET['search']) && !empty(trim($_GET['search']))){
    //         $universities = $model->search(trim($_GET['search']));
    //     }
    //     else{
    //         $universities=$model->all();
    //     }

    //     require_once __DIR__ . '/../Views/universities/index.php';
    // }
    public function create()
    {
        require_once __DIR__ . '/../Views/universities/create.php';


    }
    public function store()
    {
        $model=new University();

        

        $logo=null;
        if(isset($_FILES['logo']) && $_FILES['logo']['error']==0){
            $filename=time() . "_" . basename($_FILES['logo']['name']);
            $uploadPath= __DIR__ . "/../../public/assets/uploads/logos/" . $filename;

          
           if( move_uploaded_file($_FILES['logo']['tmp_name'], $uploadPath))
            {

             $logo=$filename;
            
            }
            else{
                die("Failed to move uploaded file.");
            }
                // $filename = time() . "_" . basename($_FILES['logo']['name']);

// $uploadPath = __DIR__ . "/../../public/uploads/logos/" . $filename;

        }

        $_POST['logo']=$logo;
        
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
      public function show()
    {
        if(!isset($_GET['id'])){
            die("University ID not found.");
        }
        $model=new University();

        $university=$model->find($_GET['id']);

        require_once __DIR__  . '/../Views/universities/show.php';
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
    public function index()
    {
        $model=new University();

        //current page (default=1)

        $page=isset($_GET['p']) ? (int)$_GET['p'] : 1;

        //Number of record per page

        $limit=5;

        //calculate offset

        $offset=($page-1)* $limit;

        //total univeersities

        $totalUniversities = $model->count();

        //Total pages
        $totalPages= ceil($totalUniversities/$limit);

        // Get universities for the current page
        $universities= $model->all($limit, $offset);


        require_once __DIR__ . '/../Views/universities/index.php';
    }
  
 }
?>