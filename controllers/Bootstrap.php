<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'keuangan');
$sesilogin = isset($_SESSION['login']) ? 'true' : 'false';
$parampage = isset($_GET['page']) ? $_GET['page'] : "";
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
    include "views/template.php";
}

