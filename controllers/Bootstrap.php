<?php
session_start();
$con = mysqli_connect('localhost', 'root', '1234569', 'keuangan');
$sesilogin = isset($_SESSION['login']) ? 'true' : 'false';
$parampage = isset($_GET['page']) ? $_GET['page'] : "";
$paramact = isset($_GET['act']) ? $_GET['act'] : "";
if($parampage=='login'){
    include "controllers/Login.php";
    include "views/login.php";
}else{
    //sesi timeout
    if (!isset($_SESSION['CREATED'])) {
        $_SESSION['CREATED'] = time();
    } else if (time() - $_SESSION['CREATED'] > 1800) {
        // session started more than 30 minutes ago
        session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
        $_SESSION['CREATED'] = time();  // update creation time
    }
    if($sesilogin=='false'){
        header('location: ?page=login');
    }
    if($parampage == ""){
        include "controllers/Dashboard.php";
    }else{
        include "controllers/".ucfirst($parampage).".php";
    }
    include "views/template.php";
}
if(!$con){
    include "views/error.php";
}

