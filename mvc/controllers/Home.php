<?php

// http://localhost/live/Home/Show/1/2
require_once "./mvc/validates/FilmValidate.php";

class Home extends Controller{

    protected $loginModel;
    protected $filmModel;
    protected $filmValidate;
    function __construct(){
        if(!isset($_SESSION['username'])&&!isset($_COOKIE['token'])){
            header('location: /php_test/Login');
        }
        $this->loginModel=$this->model("LoginModel");
        $this->filmModel=$this->model("FilmModel");
        $this->filmValidate=new FilmValidate();
    }

    public function ShowView(){
        $listFilm= $this->filmModel->show();
        
        $this->view("master", [
            "pages"=>"show",
            "listFilm"=>$listFilm,
        ],);
    }

    public function edit($id){
        $editFilm= $this->filmModel->getFilm($id);
        $this->view("master", [
            "pages"=>"edit",
            "filmEdit"=>$editFilm,
        ]);
    }
    public function post_edit($id){

        $errEditFilm= $this->filmModel->editFilm($id);
        $editFilm= $this->filmModel->getFilm($id);
        if(sizeof($errEditFilm)==1){
            header('location: /php_test/Home');
        }else{
            
            $this->view("master", [
                "pages"=>"edit",
                "filmEdit"=>$editFilm,
                "err"=>$errEditFilm,
            ]);
        }
     
    }

    public function del($id){
        $result_del=$this->filmModel->del($id);
        header('location: /php_test/Home');
    }

    public function create(){
        $this->view("master", [
            "pages"=>"create",
        ]);
    }

    public function post_create(){
        // print_r($_POST);
        $errFilm= $this->filmModel->createFilm();
        if(sizeof($errFilm)==1){
            header('location: /php_test/Home');
            // print_r($errFilm);
        }else{
            // print_r($errFilm);
            $this->view("master", [
                "pages"=>"create",
                "err"=>$errFilm,
            ]);
        }
        
    }

    public function test(){
        // $data=$this->filmValidate->testcon();
        print_r($_GET);
    }

    
}
?>