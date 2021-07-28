<?php

class Ajax extends Controller{
    protected $filmModel;
    function __construct(){
        $this->filmModel=$this->model("FilmModel");
    }
    public function checkNameCreate(){
        $nameCreate=$_POST['nameCreate'];
        echo $this->filmModel->checkNameCreate($nameCreate);
    }
    public function checkNameEdit($id){
        $nameEdit=$_POST['nameEdit'];
        echo $this->filmModel->checkNameEdit($nameEdit,$id);
    }
}

?>