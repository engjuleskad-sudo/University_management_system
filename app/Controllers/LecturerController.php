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

public function edit()
{
    if (!isset($_GET['id'])) {
        header("Location: ?page=lecturers");
        exit;
    }

    $id = (int) $_GET['id'];

    $model = new Lecturer();
    $lecturer = $model->find($id);

    if (!$lecturer) {
        $_SESSION['error'] = "Lecturer not found.";
        header("Location: ?page=lecturers");
        exit;
    }

    $universityModel = new University();
    $universities = $universityModel->getAll();

    // Display the form with existing lecturer information.
    require_once __DIR__ . '/../Views/lecturers/edit.php';
}

public function update()
{
    if (!isset($_GET['id'])) {
        header("Location: ?page=lecturers");
        exit;
    }

    $id = (int) $_GET['id'];

    $model = new Lecturer();
    $lecturer = $model->find($id);

    if (!$lecturer) {
        $_SESSION['error'] = "Lecturer not found.";
        header("Location: ?page=lecturers");
        exit;
    }

    $data = $_POST;

    // Preserve the existing photo.
    $data['photo'] = $lecturer['photo'];

    // Handle an optional replacement photo.
    if (
        isset($_FILES['photo']) &&
        $_FILES['photo']['error'] === UPLOAD_ERR_OK
    ) {
        $uploadDir = __DIR__ .
            "/../../public/assets/uploads/lecturers/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $originalFileName = basename($_FILES['photo']['name']);
        $extension = strtolower(
            pathinfo($originalFileName, PATHINFO_EXTENSION)
        );

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array($extension, $allowedExtensions, true)) {
            $_SESSION['error'] = "Invalid photo format.";
            header("Location: ?page=edit-lecturer&id=" . $id);
            exit;
        }

        $fileName = uniqid('lecturer_', true) . '.' . $extension;
        $uploadPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)) {
            $data['photo'] = $fileName;
        } else {
            $_SESSION['error'] = "Failed to upload lecturer photo.";
            header("Location: ?page=edit-lecturer&id=" . $id);
            exit;
        }
    } elseif (
        isset($_FILES['photo']) &&
        $_FILES['photo']['error'] !== UPLOAD_ERR_NO_FILE
    ) {
        $_SESSION['error'] = "There was an error uploading the photo.";
        header("Location: ?page=edit-lecturer&id=" . $id);
        exit;
    }

    // Validate required fields.
    $requiredFields = [
        'university_id',
        'staff_number',
        'first_name',
        'last_name',
        'gender',
        'email'
    ];

    foreach ($requiredFields as $field) {
        if (!isset($data[$field]) || trim($data[$field]) === '') {
            $_SESSION['error'] = "Please fill in all required fields.";
            header("Location: ?page=edit-lecturer&id=" . $id);
            exit;
        }
    }

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Please enter a valid email address.";
        header("Location: ?page=edit-lecturer&id=" . $id);
        exit;
    }

    try {
        $model->update($id, $data);
    } catch (PDOException $e) {
        $_SESSION['error'] =
            "Could not update lecturer. Check the staff number and email.";

        header("Location: ?page=edit-lecturer&id=" . $id);
        exit;
    }

    $_SESSION['success'] = "Lecturer updated successfully.";

    header("Location: ?page=view-lecturer&id=" . $id);
    exit;
}
}
