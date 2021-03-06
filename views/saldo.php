<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Saldo</h1>
        <!-- <a href="?page=saldo&act=tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus fa-sm text-white-50"></i> Tambah Saldo</a> -->
        <h1 class="mt-2 mb-0 text-success">Rp <?php echo number_format($arraysaldoterakhir['saldo'],0,",","."); ?></h1>
    </div>
    <hr>
    <!-- Content Row -->
    <div class="row">
        <!-- <div class="col-3">
            <label for="">Bulan</label>
            <select name="" id="" class="form-control">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
        <div class="col-3">
            <label for="">Tahun</label>
            <select name="" id="" class="form-control">
                <option value="">2019</option>
            </select>
        </div>
         -->
        <div class="col-12 mt-3">
            <table class="table table-bordered table-hover table-light text-dark" id="tablesaldo">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Pemasukan</th>
                        <th>Pengeluaran</th>
                        <th>Total Saldo</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    while($rowsaldo = $resultsaldo->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo ($rowsaldo['in'] != 0) ? number_format($rowsaldo['in'],0,",",".") : "-" ?></td>
                            <td><?php echo ($rowsaldo['out'] != 0) ? number_format($rowsaldo['out'],0,",",".") : "-" ?></td>
                            <td><?php echo number_format($rowsaldo['saldo'],0,",",".") ?></td>
                            <td><?php echo $rowsaldo['reg'] ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(function(){
    $('#tablesaldo').DataTable({
        "order": [[ 4, "desc" ]]
    });
})
</script>