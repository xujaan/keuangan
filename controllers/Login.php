<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = hash('sha512', $_POST['password']);
    $querylogin = "select * from users where username = '$username' and password = '$password' limit 1";
    $result = $con->query($querylogin);
    $numrows = $result->num_rows;
    if($numrows==1){
        $_SESSION['login'] = 'true';
        header('location: ?page=dashboard');
    }else{
        header('location: ?page=login&alert=gagal');
    }
}