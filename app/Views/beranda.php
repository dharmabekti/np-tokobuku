<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Primary Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Warning Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Success Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Danger Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Grafik Transaksi Penjualan
                            <div class="col-sm-3 mt-3">
                                <input type="number" value="<?= date('Y') ?>" id="tahun_transaksi" class="form-control"
                                    onchange="getTransaksi()">
                            </div>
                        </div>
                        <div class="card-body"><canvas id="chartTransaksi" width="100%" height="40"></canvas></div>
                        <div class="m-3 justify-content-md-end d-md-flex gap-2">
                            <a id="download-transaksi" download="chart-transaksi.png">
                                <button class="btn btn-outline-secondary btn-sm"
                                    onclick="downloadChartTransaksi('PNG')">Unduh PNG</button>
                            </a>
                            <button class="btn btn-outline-secondary btn-sm"
                                onclick="downloadChartTransaksi('PDF')">Unduh PDF</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Grafik Jumlah Customer
                            <div class="col-sm-3 mt-3">
                                <input type="number" value="<?= date('Y') ?>" id="tahun_customer" class="form-control"
                                    onchange="getCustomer()">
                            </div>
                        </div>
                        <div class="card-body"><canvas id="chartCustomer" width="100%" height="40"></canvas></div>
                        <div class="m-3 justify-content-md-end d-md-flex gap-2">
                            <a id="download-customer" download="chart-customer.png">
                                <button class="btn btn-outline-secondary btn-sm"
                                    onclick="downloadChartCustomer('PNG')">Unduh PNG</button>
                            </a>
                            <button class="btn btn-outline-secondary btn-sm"
                                onclick="downloadChartCustomer('PDF')">Unduh PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
    $(document).ready(function() {
        getTransaksi()
        getCustomer()
    })

    // Chart Transaksi
    function chartTransaksi(dataset) {
        // Area Chart Example
        var ctx = document.getElementById("chartTransaksi");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                    label: "Total",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: dataset,
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });
    }

    // Fungsi untuk mengakses data transaksi
    function getTransaksi() {
        var tahun = $('#tahun_transaksi').val()
        $.ajax({
            url: "/chart-transaksi",
            method: "post",
            data: {
                tahun: tahun
            },
            success: function(response) {
                var result = JSON.parse(response);

                var dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                $.each(result.data, function(i, item) {
                    // console.log(item);
                    dataset[item.bulan - 1] = item.total
                });
                console.log(dataset)
                chartTransaksi(dataset)
            }
        });
    }


    // Chart Customer
    function chartCustomer(dataset) {
        // Bar Chart Example
        var ctx = document.getElementById("chartCustomer");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                    label: "Jumlah",
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                    data: dataset,
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });
    }

    // Fungsi untuk mengakses data transcustomeraksi
    function getCustomer() {
        var tahun = $('#tahun_customer').val()
        $.ajax({
            url: "/chart-customer",
            method: "post",
            data: {
                tahun: tahun
            },
            success: function(response) {
                var result = JSON.parse(response);

                var dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                $.each(result.data, function(i, item) {
                    // console.log(item);
                    dataset[item.bulan - 1] = item.total
                });
                console.log(dataset)
                chartCustomer(dataset)
            }
        });
    }

    // Unduh Chart
    function downloadChartTransaksi(type) {
        var download = document.getElementById('download-transaksi')
        var chart = document.getElementById('chartTransaksi')

        if (type === "PNG") {
            // export IMG
            convertChartImg(download, chart)
        } else {
            // export ke dalam PDF
            convertChartPDF(chart, "chart-transaksi.pdf", "Grafik Transaksi Penjualan")
        }
    }

    function downloadChartCustomer(type) {
        var download = document.getElementById('download-customer')
        var chart = document.getElementById('chartCustomer')

        if (type === "PNG") {
            // export IMG
            convertChartImg(download, chart)
        } else {
            // export ke dalam PDF
            convertChartPDF(chart, "chart-customer.pdf", "Grafik Jumlah Customer")
        }
    }




    function convertChartImg(download, chart) {
        var img = chart.toDataURL('image/jpg', 1.0).replace('image/jpg', 'image/octet-stream');
        download.setAttribute('href', img)
    }

    function convertChartPDF(chart, filename, title) {
        var img = chart.toDataURL('image/jpg', 1.0).replace('image/jpg', 'image/octet-stream');
        window.jsPDF = window.jspdf.jsPDF
        var doc = new jsPDF() // Settingan default 'p', 'mm', 'A4'
        doc.addImage(img, 'JPEG', 10, 15, 0, 0)
        doc.text(10, 10, title)
        doc.save(filename)
    }
    </script>
    <?= $this->endsection() ?>