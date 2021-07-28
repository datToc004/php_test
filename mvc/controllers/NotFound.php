<?php

// http://localhost/live/Home/Show/1/2

class NotFound extends Controller{

    protected $loginModel;
    function __construct(){
        $this->loginModel=$this->model("LoginModel");
    }

    public function ShowView(){
        $this->view("notFound", []);
    }
}
?>