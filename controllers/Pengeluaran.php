<?php
if(isset($_POST['simpan'])){
    $kode_out = isset($_POST['kode_out']) ? $_POST['kode_out'] : "";
    $keperluan_out = isset($_POST['keperluan_out']) ? $_POST['keperluan_out'] : "";
    $nominal_out = isset($_POST['nominal_out']) ? $_POST['nominal_out'] : "";
    $tanggal_out = isset($_POST['tanggal_out']) ? $_POST['tanggal_out'] : "";
    $user_out = $_SESSION['username'];
    $querysimpan = "insert into pengeluaran (kode_out,keperluan_out,nominal_out,tgl_out,user_out) values 
    ('$kode_out','$keperluan_out','$nominal_out','$tanggal_out','$user_out')";
    //tambah saldo
    $ceksaldoterakhir = $con->query("select * from saldo order by reg desc limit 1");
    $arraysaldoterakhir = $ceksaldoterakhir->fetch_assoc();
    // print_r($arraysaldoterakhir);
    $totalsaldo = $arraysaldoterakhir['saldo'] - $nominal_out;
    // echo $totalsaldo;
    $querysaldo = "insert into `saldo` (`saldo`, `in`, `out`) values ('$totalsaldo','0','$nominal_out')";
    $resultsaldo = $con->query($querysaldo);    
    $resultsimpan = $con->query($querysimpan);

    if(isset($_POST['uraian'])){
        $uraian = $_POST['uraian'];
        $nominal = $_POST['nominal'];
        $ket = $_POST['ket'];
        for ($i=0; $i < count($uraian); $i++) { 
            $querydetail = "insert into detail_pengeluaran (kode_out,uraian,nominal,ket) values 
            ('$kode_out','".$uraian[$i]."','".$nominal[$i]."','".$ket[$i]."')";
            $resultdetail = $con->query($querydetail);   
        }
    }
    if(!$resultsimpan){
        header("location: ?page=pengeluaran&alert=gagal");
    }else{
        header("location: ?page=pengeluaran&alert=berhasil");
    }
}
$resultpengeluaran = $con->query("select * from pengeluaran order by id_out asc");
if($paramact == 'detail'){
    $resultdetail = $con->query("select * from pengeluaran p left join detail_pengeluaran d on p.kode_out = d.kode_out where p.kode_out = '$paramkode'");
    $resultdetailpeng = $con->query("select * from pengeluaran where kode_out = '$paramkode' limit 1");
    $rowpeng = $resultdetailpeng->fetch_array();
}
include "views/template.php";