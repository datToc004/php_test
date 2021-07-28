<?php

class FilmValidate extends Validate{

    protected $db;

    function __construct(){
        $this->db=new DB();
        // echo "adsafsd";
    }

    public function testcon(){
        $err=array(array());
        return $this->checkReq();
    }

}

?>