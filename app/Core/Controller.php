<?php
class Controller
{/*
    Load view
    @param String $view
    @param array $data

*/

protected function view(string $view, array $data=[]): void
{
    extract($data);
    $file = __DIR__ . '/../Views/'. $view . '.php';

    if(file_exists($file)){
        require $file;

    }
    else{
        die("View '{$view}' not found.");
    }
}
}
?>