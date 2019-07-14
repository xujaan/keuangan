<?php
$ceksaldoterakhir = $con->query("select * from saldo order by reg desc limit 1");
$arraysaldoterakhir = $ceksaldoterakhir->fetch_assoc();
if($paramcari!=""){
    $resultsaldo = $con->query("SELECT * FROM saldo WHERE CONCAT(kode_in, sumber_in, nominal_in, tgl_in, user_in) LIKE '%".$paramcari."%'");
}else{
    $resultsaldo = $con->query("select * from saldo order by id_saldo desc");
}
if($paramact == "api"){
    $resultsaldoapi = $con->query("select * from saldo order by id_saldo asc");
    while($r = mysqli_fetch_assoc($resultsaldoapi)) {
        $rows[] = $r;
    }
    print json_encode($rows);
}else{
    include "views/template.php";
}