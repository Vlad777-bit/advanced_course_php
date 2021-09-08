<?php
session_start();

class Controller
{
    public $view = 'admin';
    public $title;

    function __construct() {
        $this->title = Config::get('sitename');
        $this->titlePage = '';
        $this->userName = $_SESSION['name'] ?? '';
        $this->isAdmin = $_SESSION['isAdmin'] ?? '';
    }

    public function index($data) {
        return [];
    } 
}