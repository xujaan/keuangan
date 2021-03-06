<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    if($paramalert == "berhasil"){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil menambah data.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php }elseif($paramalert == "gagal"){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Gagal menambah data.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pemasukan</h1>
        <a href="#" data-toggle="modal" data-target="#tambahpemasukanModal" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pemasukan</a>
    </div>
    <form action="" method="get">
    <input type="hidden" name="page" value="pemasukan">
    <div class="row">
        <div class="col-md-3 col-sm-12 mb-3">
            <label for="">Bulan</label>
            <select name="bulan" id="" class="form-control">
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
        <div class="col-md-3 col-sm-12 mb-3">
            <label for="">Tahun</label>
            <select name="tahun" id="" class="form-control">
                <option value="2019">2019</option>
            </select>
        </div>
        <div class="col-md-3 col-sm-12 mb-3">
            <label for="">Cari</label>
            <div class="input-group">
              <input type="text" name="cari" class="form-control" placeholder="Masukkan kata kunci" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
            <!-- <input type="text" class="form-control" id="caripemasukan" placeholder="Masukkan kata kunci"> -->
        </div>
        <div class="col-md-3 col-sm-12 mb-3 pt-4">
            <a href="" class="float-right"><button class="btn btn-info btn-sm">Print Laporan</button></a>
        </div>
    </div>
    </form>
    <div class="row">
        <div class="col-12 mt-3 table-responsive">
            <table id="dataTable" class="table table-bordered table-hover table-light text-dark">
                <thead>
                    <tr class="table-primary">
                        <th>Kode</th>
                        <th>Sumber</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Penginput</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="bodytable">
                <?php 
                while($rowpemasukan = $resultpemasukan->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $rowpemasukan['kode_in']; ?></td>
                        <td><?php echo $rowpemasukan['sumber_in']; ?></td>
                        <td><?php echo number_format($rowpemasukan['nominal_in'],0,",","."); ?></td>
                        <td><?php echo $rowpemasukan['tgl_in']; ?></td>
                        <td><?php echo $rowpemasukan['user_in']; ?></td>
                        <td><?php 
                        if($rowpemasukan['user_in'] == $_SESSION['username']){
                            echo "<a href='#' onclick=\"editpemasukan('".$rowpemasukan['kode_in']."','".$rowpemasukan['sumber_in']."','".$rowpemasukan['nominal_in']."','".$rowpemasukan['tgl_in']."')\"><i class='fas fa-edit'></i></a>";
                        }else{
                            echo "-";
                        }
                        ?></td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahpemasukanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pemasukan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" class="form-control" id="kode_in" name="kode_in" readonly>
                    </div>
                    <div class="form-group">
                        <label>Sumber</label>
                        <input type="text" class="form-control" name="sumber_in" id="sumber_in">
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" class="form-control" name="nominal_in" id="nominal_in">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" id="tanggal_in" name="tanggal_in">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function () {
        Date.prototype.toDateInputValue = (function () {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0, 10);
        });

        $('#kode_in').val("IN" + Math.floor(Math.random() * 1234));
        $('#tanggal_in').val(new Date().toDateInputValue());
        // tampilpemasukan();
        $('#dataTable').DataTable({
            "order": [[ 3, "desc" ]],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data perhalaman",
                "zeroRecords": "Tidak ada data tersedia",
                "info": "Tampilkan hal _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
    });

    function editpemasukan(kode, sumber, nominal, tgl) {
        $('#tambahpemasukanModal').modal('show');
        $('#kode_in').val(kode);
        $('#sumber_in').val(sumber);
        $('#nominal_in').val(nominal);
        $('#tgl_in').val(tgl);
        $('#exampleModalLabel').html('Edit Pemasukan');
    };
</script>