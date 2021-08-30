<?php

class IndexController extends Controller
{
    public $view = 'index';
    public $title;
    public $titlePage;
 
    function __construct()
    {
        parent::__construct();
        $this->title .= ' | Главная';
        $this->titlePage = 'E-bike';
    }
	
	//метод, который отправляет в представление информацию в виде переменной content_data
	function index($data){
       
	}

	/*function test($id){

    }
*/

}

//site/index.php?path=index/test/5