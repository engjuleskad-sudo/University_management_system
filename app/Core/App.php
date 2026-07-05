<?php
require_once __DIR__ . '/Router.php';

class App 
{
    public function run(): void 
    {
        $router= new Router();
        $router->dispatch();
    }
}
?>