<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat Datang di Aplikasi Keuangan</h1>
    <!-- <a href="./assets/#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo number_format($saldo,0,",","."); ?></div>
            </div>
            <!-- <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pemasukan Bulan Ini</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo number_format($pemasukan,0,",","."); ?></div>
            </div>
            <!-- <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengeluaran Bulan Ini</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp <?php echo number_format($pengeluaran,0,",","."); ?></div>
                </div>
                <!-- <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div> -->
              </div>
            </div>
            <!-- <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengajuan Dana</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18 Laporan</div>
            </div>
            <!-- <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Grafik Analisa</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="./assets/#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="./assets/#">Action</a>
              <a class="dropdown-item" href="./assets/#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./assets/#">Something else here</a>
            </div> -->
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            <canvas id="chartSaldo"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Pesan Umum
            <!-- <small class="text-muted">(diperbarui setiap 1 menit)</small> -->
          </h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="./assets/#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-sync fa-sm fa-fw text-gray-400"></i>
            </a>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie">
            <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
          </div>
          <div class="mt-0 text-center small">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Tulis pesan"
                aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-paper-plane fa-sm"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<script>
  $(function () {
    $.getJSON('http://localhost:8000/?page=saldo&act=api', function (e) {
      var labels = e.map(function (key) {
        return key.reg;
      });
      var datasaldo = e.map(function (key) {
        return key.saldo;
      });
      var datain = e.map(function (key) {
        return key.in;
      });
      var dataout = e.map(function (key) {
        return key.out;
      });


      new Chart(document.getElementById("chartSaldo"), {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            data: datasaldo,
            label: "Saldo",
            borderColor: "#6bc44b",
            fill: false
          }, {
            data: datain,
            label: "Pemasukan",
            borderColor: "#3e95cd",
            fill: false
          }, {
            data: dataout,
            label: "Pengeluaran",
            borderColor: "#f0d959",
            fill: false
          }]
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10
          }
        }
      });
    });
  })
</script>