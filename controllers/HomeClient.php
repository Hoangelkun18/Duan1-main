<?php 

class HomeClient
{
    public function index() {
        $view = 'dashboard';
        $title = 'dashboard';
        require_once './views/client/main.php';
    }
}