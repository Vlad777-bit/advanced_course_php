<?php
class AdminController extends Controller 
{
    public $view = 'admin'; 
    public $title;
    public $titlePage;

    function __construct()
    {
        parent::__construct();
        $this->title .= " | Админка";
        $this->titlePage = "Добро пожаловать в Админку";
    }
    
    public function index($data)
    {
        if ($_SESSION['is_admin']) {
            return Good::getGoods();
        }
    } 

    public function editGood()
    {
        $this->titlePage = "Редактирование товара";

        if (isset($_POST)) {
           return Good::checkActionGood();
        }
    }
}  