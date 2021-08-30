<?php

class Controller
{
    public $view = 'admin';
    public $title;

    function __construct() {
        $this->title = Config::get('sitename');
        $this->titlePage = '';
    }

    public function index($data) {
        return [];
    } 
}