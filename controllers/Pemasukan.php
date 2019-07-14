<?php
if(isset($_POST['simpan'])){
    $kode_in = isset($_POST['kode_in']) ? $_POST['kode_in'] : "";
    $sumber_in = isset($_POST['sumber_in']) ? $_POST['sumber_in'] : "";
    $nominal_in = isset($_POST['nominal_in']) ? $_POST['nominal_in'] : "";
    $tanggal_in = isset($_POST['tanggal_in']) ? $_POST['tanggal_in'] : "";
    $user_in = $_SESSION['username'];
    $querysimpan = "insert into pemasukan (kode_in, sumber_in, nominal_in, tgl_in, user_in) 
    values ('$kode_in', '$sumber_in', '$nominal_in', '$tanggal_in', '$user_in')";
    //tambah saldo
    $ceksaldoterakhir = $con->query("select * from saldo order by reg desc limit 1");
    $arraysaldoterakhir = $ceksaldoterakhir->fetch_assoc();
    // print_r($arraysaldoterakhir);
    $totalsaldo = $nominal_in + $arraysaldoterakhir['saldo'];
    // echo $totalsaldo;
    $querysaldo = "insert into `saldo` (`saldo`, `in`, `out`) values ('$totalsaldo','$nominal_in','0')";
    $resultsaldo = $con->query($querysaldo);
    // print_r($querysaldo);
    $resultsimpan = $con->query($querysimpan);
    if(!$resultsimpan || !$resultsaldo){
        // header("location: ?page=pemasukan&alert=gagal");
    }else{
        header("location: ?page=pemasukan&alert=berhasil");
    }
}

// if($paramact == "json"){
    if($paramcari!=""){
        $resultpemasukan = $con->query("SELECT * FROM pemasukan WHERE CONCAT(kode_in, sumber_in, nominal_in, tgl_in, user_in) LIKE '%".$paramcari."%'");
    }else{
        $resultpemasukan = $con->query("select * from pemasukan order by id_in desc");
    }
    // $rows = array();
    // while($arraypemasukan = $resultpemasukan->fetch_assoc()) {
        // $rows[] = $arraypemasukan;
    // }
    // print json_encode($rows);
// }else{
    include "views/template.php";
// }