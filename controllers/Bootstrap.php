<?php
session_start();
$rooturl = "http://localhost:8000/";
$con = mysqli_connect('localhost', 'root', '1234569', 'keuangan');
$sesilogin = isset($_SESSION['login']) ? 'true' : 'false';
$parampage = isset($_GET['page']) ? $_GET['page'] : "";
$paramact = isset($_GET['act']) ? $_GET['act'] : "";
$paramalert = isset($_GET['alert']) ? $_GET['alert'] : "";
$paramcari = isset($_GET['cari']) ? $_GET['cari'] : "";
$paramkode = isset($_GET['kode']) ? $_GET['kode'] : "";
//sesi timeout
if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 1800) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}
if($parampage=='login'){
    include "controllers/Login.php";
    include "views/login.php";
}else{
    
    if($sesilogin=='false'){
        header('location: ?page=login');
    }
    if($parampage == ""){
        include "controllers/Dashboard.php";
    }else{
        include "controllers/".ucfirst($parampage).".php";
    }
}
if(!$con){
    include "views/error.php";
}

