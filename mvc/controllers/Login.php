<?php


class Login extends Controller{

    protected $loginModel;
    function __construct(){
        
        if(isset($_SESSION['username'])||isset($_COOKIE['token'])){
            if(isset($_COOKIE['username'])){
                $_SESSION['username']=$_COOKIE['username'];
            }
            
            header('location: /php_test/Home');
        }
        $this->loginModel=$this->model("LoginModel");
    }

    public function ShowView(){
        $this->view("login", []);
    }
    
    public function Signin(){
        $result_mes=false;
        if (isset($_POST['submit'])) {
            $username=$_POST['username'];
            $password_input=$_POST['password'];
           
            if(empty($_POST['username'])||empty($_POST['password'])){
                $this->view("login", [
                    "result"=>$result_mes,
                ]);
            }
            $result=$this->loginModel->login($username);
            
            if(mysqli_num_rows($result)==1){
                $row=mysqli_fetch_array($result);
                $password=$row['password'];
                if(password_verify($password_input,$password)){
                    $_SESSION['username']=$username;
                    $token_u=md5($username);
                    $token_p=md5($password_input);
                    $token=$token_p.".".$token_u;
                    if(isset($_POST['remember'])){
                        setcookie("token",$token, time() + 900, "/");
                    }
                    
                    header('location: /php_test/Home');
                }else{
                    $this->view("login", [
                        "result"=>$result_mes,
                    ]);
                }
                
			    
            }else{
                $this->view("login", [
                    "result"=>$result_mes,
                ]);
            }
        }
    }
    public function Logout(){
        unset($_SESSION['username']);
        session_destroy();
        setcookie( "token", "", time()- 900, "/","", 0);
        $this->view("login", [
            
        ]);
    }
   
}
?>