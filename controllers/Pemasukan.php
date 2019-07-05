<?php
if(isset($_POST['simpan'])){
    $kode_in = isset($_POST['kode_in']) ? $_POST['kode_in'] : "";
    $sumber_in = isset($_POST['sumber_in']) ? $_POST['sumber_in'] : "";
    $nominal_in = isset($_POST['nominal_in']) ? $_POST['nominal_in'] : "";
    $tanggal_in = isset($_POST['tanggal_in']) ? $_POST['tanggal_in'] : "";
    $user_in = $_SESSION['username'];
    $querysimpan = "insert into pemasukan (kode_in, sumber_in, nominal_in, tgl_in, user_in) 
    values ('$kode_in', '$sumber_in', '$nominal_in', '$tanggal_in', '$user_in')";
    $resultsimpan = $con->query($querysimpan);
    if(!$resultsimpan){
        header("location: ?page=pemasukan&alert=gagal");
    }else{
        header("location: ?page=pemasukan&alert=berhasil");
    }
}

$resultpemasukan = $con->query("select * from pemasukan");
if($paramact == "json"){
    while($arraypemasukan = $resultpemasukan->fetch_assoc()) {
        $rows[] = $arraypemasukan;
    }
    print json_encode($rows);
}else{
    include "views/template.php";
}