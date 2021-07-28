<?php

class Validate{
    
    public function checkReq($data){
        return empty($data);
    }
    
    public function checkMin($data,$min){
        if(strlen($data)>$min){
            return true;
        }
        return false;
    }
    public function checkMax($data,$max){
        if(strlen($data)<$max){
            return true;
        }
        return false;
    }
    public function checkLength($data,$min,$max){
        if(strlen($data)<$max&&strlen($data)>$min){
            return true;
        }
        return false;
    }
    public function is_email($str) {
        // Chứa các ký tự chữ cái, chữ số, dấu chấm, gạch dưới
        // Ký tự @
        // Nhóm ký tự trước @ có 6-32 ký tự
        // Nhóm ký tự sau @ là domain một hoặc nhiều cấp

        return (!preg_match("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/", $str)) ? FALSE : TRUE;
    }
    public function checkName($str){

        return(!preg_match("/^[a-zA-Z0-9]+$/",$name));
    }
    public function checkUserName($str){
        // Username  bao gồm các ký tự chữ cái, chữ số, dấu gạch dưới
        // Độ dài 6-32 ký tự

        return (!preg_match("/^[A-Za-z0-9_]{6,32}$/",$username));
    }
    public function checkPhone($number){
        $number = str_replace(array('-', '.', ' '), '', $number);
        return (!preg_match('/^0[0-9]{8}$/', $number)) ;
    }
}

?>