<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if($paramact == 'tambah'){ ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pemasukan</h1>
    </div>
    <div class="row">
        <div class="col-12"></div>
    </div>    
    <?php }else{ ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pemasukan</h1>
        <a href="?page=pemasukan&act=tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Pemasukan</a>
    </div>
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
            <input type="text" class="form-control" placeholder="Cari berdasarkan sumber">
        </div>
        <div class="col-12 mt-3">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Sumber</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Penginput</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <?php } ?>
</div>