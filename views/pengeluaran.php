<?php 
if($paramact == "tambah"){ ?>
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
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pengeluaran</h1>
    </div>
    <!-- Content Row -->
    <form action="" method="post">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" class="form-control" id="kode_out" name="kode_out" readonly>
                </div>
                <div class="form-group">
                    <label>Keperluan</label>
                    <input type="text" class="form-control" name="keperluan_out" id="keperluan_out">
                </div>
                <div class="form-group">
                    <label>Total Nominal</label>
                    <input type="number" class="form-control" name="nominal_out" id="nominal_out">
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" id="tanggal_out" name="tanggal_out">
                </div>
            </div>
            <div class="col-12">
                <div class="input_fields_wrap">
                    <hr>
                    <label class="h4 text-gray-800" for="">Detail Pengeluaran</label>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="">Uraian</label>
                                <input type="text" class="form-control" name="uraian[]">
                            </div>
                            <div class="col-4">
                                <label for="">Nominal</label>
                                <input type="number" id="nominal" onkeyup="caritotal()" class="form-control" name="nominal[]">
                            </div>
                            <div class="col-3">
                                <label for="">Keterangan</label>
                                <input type="text" class="form-control" name="ket[]">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm add_field_button">Tambah Detail</button>
                </div>
                <div class="form-group">
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                    <a href="?page=pengeluaran"><button type="button" class="btn btn-warning">Batal</button></a>
                </div>
                <br><br><br>
            </div>
        </div>
    </form>
</div>
<?php }elseif($paramact == 'detail'){ ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengeluaran</h1>
        <a href="?page=pengeluaran" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Kembali</a>
    </div>
    <div class="row text-dark">
        <div class="col-6">
            <table class="table table-borderless table-sm">
                <tr>
                    <td>Kode</td>
                    <td>:</td>
                    <td><span class="text-primary"><?php echo $rowpeng['1']; ?></span></td>
                </tr>
                <tr>
                    <td>Keperluan</td>
                    <td>:</td>
                    <td><span class="text-primary"><?php echo $rowpeng['2']; ?></span></td>
                </tr>
                <tr>
                    <td>Total Nominal</td>
                    <td>:</td>
                    <td><span class="text-primary">Rp <?php echo number_format($rowpeng['3'],0,",","."); ?></span></td>
                </tr>
            </table>
            
        </div>
        <div class="col-12 mt-3">
            <table class="table table-bordered table-hover table-light text-dark">
            <thead class="table-primary">
                <tr>
                    <th>No.</th>
                    <th>Uraian</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no=1;
            while($rowdetail = $resultdetail->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $rowdetail['uraian'] ?></td>
                    <td><?php echo number_format($rowdetail['nominal'],0,",",".") ?></td>
                    <td><?php echo (!$rowdetail['ket']) ? "-" : $rowdetail['ket']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<?php }else{
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengeluaran</h1>
        <a href="?page=pengeluaran&act=tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Pengeluaran</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-3">
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
        <div class="col-3">
            <label for="">Cari</label>
            <input type="text" class="form-control" placeholder="Cari berdasarkan keperluan">
        </div>
        <div class="col-12 mt-3">
            <table class="table table-bordered table-hover" id="dataTable">
                <thead class="table-primary">
                    <tr>
                        <th>Kode</th>
                        <th>Keperluan</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Penginput</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                while($rowpengeluaran = $resultpengeluaran->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $rowpengeluaran['kode_out']; ?></td>
                        <td><?php echo $rowpengeluaran['keperluan_out']; ?></td>
                        <td><?php echo number_format($rowpengeluaran['nominal_out'],0,",","."); ?></td>
                        <td><?php echo $rowpengeluaran['tgl_out']; ?></td>
                        <td><?php echo $rowpengeluaran['user_out']; ?></td>
                        <td>
                            <a href="?page=pengeluaran&act=detail&kode=<?php echo $rowpengeluaran['kode_out']; ?>"><i class="fas fa-list"></i> Detail</a>
                        </td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>
<script>
    $(function () {
        Date.prototype.toDateInputValue = (function () {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0, 10);
        });

        $('#kode_out').val("OUT" + Math.floor(Math.random() * 1234));
        $('#tanggal_out').val(new Date().toDateInputValue());
        // tampilpemasukan();
        $('#dataTable').DataTable({
            "order": [
                [3, "desc"]
            ]
        });

        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(
                    `<div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" class="form-control" name="uraian[]">
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control" onkeyup="caritotal()" id="nominal" name="nominal[]">
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" name="ket[]">
                            </div>
                            <div class="col-1">
                                <a href="#" class="remove_field"><i class="fas fa-times"></i> Hapus</a>
                            </div>
                        </div>
                    </div>`
                ); //add input box
            }
        });
        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            ($(this).parent('div')).parent('div').remove();
            x--;
        })
    });
    function caritotal(){
        // var nominal = $('.nominal').val();
        // console.log(nominal);
    }
</script>