<?php
session_start();

require_once "./mvc/Bridge.php";
$myApp = new App();
// if($_SERVER['REQUEST_METHOD']==='POST'){
//     // echo hash_equals($_SESSION['token'], $_POST['token']);
//     if(!isset($_POST['token'])){
//         die('chet do thieu csrf');
//     }
// }
// $_SESSION['token_2'] = $_SESSION['token'];
// $_SESSION['token'] = bin2hex(random_bytes(32));
?>
