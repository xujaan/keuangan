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
        <a href="#" data-toggle="modal" data-target="#tambahpemasukanModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pemasukan</a>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-12 mb-3">
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
        <div class="col-md-3 col-sm-12 mb-3">
            <label for="">Tahun</label>
            <select name="" id="" class="form-control">
                <option value="">2019</option>
            </select>
        </div>
        <div class="col-md-3 col-sm-12 mb-3">
            <label for="">Cari</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Masukkan kata kunci" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
            <!-- <input type="text" class="form-control" id="caripemasukan" placeholder="Masukkan kata kunci"> -->
        </div>
        <div class="col-md-3 col-sm-12 mb-3 pt-4">
            <a href="" class="float-right"><button class="btn btn-primary btn-sm">Print Laporan</button></a>
        </div>
        <div class="col-12 mt-3 table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-warning">
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
                while($rowpemasukan =$resultpemasukan->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $rowpemasukan['kode_in']; ?></td>
                        <td><?php echo $rowpemasukan['sumber_in']; ?></td>
                        <td><?php echo $rowpemasukan['nominal_in']; ?></td>
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
    });

    function editpemasukan(kode, sumber, nominal, tgl) {
        $('#tambahpemasukanModal').modal('show');
        $('#kode_in').val(kode);
        $('#sumber_in').val(sumber);
        $('#nominal_in').val(nominal);
        $('#tgl_in').val(tgl);
        $('#exampleModalLabel').html('Edit Pemasukan');
    };
    

    function tampilpemasukan() {
        $.getJSON('<?php echo $rooturl; ?>?page=pemasukan&act=json', {
            'cari' : $('#caripemasukan').val()
        })
            .done(function (e) {
                $("#bodytable").empty();
                console.log(e);
                for (var i = 0; i < e.length; i++) {
                    var tr = $("<tr/>");
                    $(tr).append("<td>" + e[i].kode_in + "</td>");
                    $(tr).append("<td>" + e[i].sumber_in + "</td>");
                    $(tr).append("<td>" + e[i].nominal_in + "</td>");
                    $(tr).append("<td>" + e[i].tgl_in + "</td>");
                    $(tr).append("<td>" + e[i].user_in + "</td>");
                    $(tr).append("<td><a href='#' data-toggle='modal' data-target='#tambahpemasukanModal'><i class='fas fa-edit'></i></a></td>");
                    $('#bodytable').append(tr);
                }
            });
    };
</script>