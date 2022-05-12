<?php
session_start();

class Controller
{
    public $view = 'admin';
    public $title;

    function __construct() {
        $this->title = Config::get('sitename');
        $this->titlePage = '';
        $this->userData = $_SESSION ?? '';
    }

    public function index($data) {
        return [];
    } 
}