<?php
$resultsaldo = $con->query("select (select saldo from saldo order by `reg` desc limit 1) as saldo, sum(`in`) as `in`, sum(`out`) as `out` from saldo");
$rowsaldo = $resultsaldo->fetch_assoc();
$saldo = $rowsaldo['saldo'];
$pemasukan = $rowsaldo['in'];
$pengeluaran = $rowsaldo['out'];
include "views/template.php";