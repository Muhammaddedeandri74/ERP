<style>
    ::placeholder {
        color: white;
        font-size: 16px;
    }

    .tu {
        text-transform: uppercase;
        color: white;
    }

    .tb {
        font-size: 18px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .lhfb {
        line-height: 0.8rem;
        font-size: 30px;
    }

    .brl {
        border: 2px solid white;
        margin-left: 2vw;
    }

    .bays {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .fontAwesome {
        font-family: 'Helvetica', FontAwesome, sans-serif;
    }
</style>
<div class="container-xxl pt-4" style="padding-left: 6vw;background-color: orange;">
    <div class="row d-flex justify-content-between">
        <div class="col-6">
            <p class="tu font-weight-bold" style="font-size: 13px">Counter / Terbaru</p>
            <p class="tu font-weight-bold" style="font-size: 25px">Counter</p>
        </div>
        <div class="col-6">
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-3 col-form-label text-white" style="text-align:right">Filter Pencarian</label>
                <div class="col-sm-9">
                    <input type="text" style="border: 2px solid white" placeholder="Cari Berdasarkan Customer atau lainnya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#xF002;" class="form-control col-8 fontAwesome bg-transparent text-white" id="inputPassword">
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="row pt-1 pb-3 d-flex justify-content-between text-white">
                <div class="col br brl">
                    <div class="pl-1 pt-4 pb-1">
                        <p class="lhfb">20</p>
                        <div class="input-group d-flex justify-content-between">
                            <p>Permintaan</p>
                            <a style="cursor: pointer;"><i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col br brl">
                    <div class="pl-1 pt-4 pb-1">
                        <p class="lhfb">20</p>
                        <div class="input-group d-flex justify-content-between">
                            <p>Return</p>
                            <a style="cursor: pointer;"><i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col br brl">
                    <div class="pl-1 pt-4 pb-1">
                        <p class="lhfb">20</p>
                        <div class="input-group d-flex justify-content-between">
                            <p>Pesanan Selesai</p>
                            <a style="cursor: pointer;"><i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col br brl">
                    <div class="pl-1 pt-4 pb-1">
                        <p class="lhfb">20</p>
                        <div class="input-group d-flex justify-content-between">
                            <p>Segera Expire</p>
                            <a style="cursor: pointer;"><i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col br brl">
                    <div class="pl-1 pt-4 pb-1">
                        <p class="lhfb">20</p>
                        <div class="input-group d-flex justify-content-between">
                            <p>Delivery Report</p>
                            <a style="cursor: pointer;"><i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="containter-xxl" style="padding-left: 6vw;">
    <div class="row d-flex justify-content-between mt-3">
        <div class="col-4">
            <div class="card bays">
                <div class="card-body">
                    <div id="chart_div"></div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="row d-flex justify-content-between">
                    <div class="col-8">
                        <p class="pt-4 pl-4"> <i class="btn fa fa-truck rounded-circle bg-primary text-white px-1 py-1" aria-hidden="true"></i> Siap</p>
                    </div>
                    <div class="col-4">
                        <p class="text-muted pt-4 pl-4">Lihat Semua</p>
                    </div>
                </div>
                <div class="card-body p-0 px-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No. So</th>
                                <th scope="col">NO. Pesanan</th>
                                <th scope="col">Tipe Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-8" style="padding-right: 2vw;">
            <div class="card bays">
                <div class="row d-flex justify-content-between">
                    <div class="col-9">
                        <div class="pt-4 pl-3" style="line-height: 0.8rem;">
                            <p class="tb ">Penjualan Terakhir</p>
                            <span>14 Transaksi Dilakukan</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <p style="text-align: right;" class="tb pt-4 pr-4 text-muted">Update a Day AGO</p>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="text-white" style="background-color: #3C2E8F;">
                            <tr>
                                <th scope="col">Tipe</th>
                                <th scope="col">Nomor</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Tgl. Order</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>Thornton</td>
                                <td>Thornton</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(drawTitleSubtitle);

    function drawTitleSubtitle() {
        var data = new google.visualization.DataTable();
        data.addColumn('timeofday', 'Time of Day');
        data.addColumn('number', 'Oktober');
        data.addColumn('number', 'September');

        data.addRows([
            [{
                v: [8, 0, 0],
                f: '8 am'
            }, 1, .25],
            [{
                v: [9, 0, 0],
                f: '9 am'
            }, 2, .5],
            [{
                v: [10, 0, 0],
                f: '10 am'
            }, 3, 1],
            [{
                v: [11, 0, 0],
                f: '11 am'
            }, 4, 2.25],
            [{
                v: [12, 0, 0],
                f: '12 pm'
            }, 5, 2.25],
            [{
                v: [13, 0, 0],
                f: '1 pm'
            }, 6, 3],
            [{
                v: [14, 0, 0],
                f: '2 pm'
            }, 7, 4],
            [{
                v: [15, 0, 0],
                f: '3 pm'
            }, 8, 5.25],
            [{
                v: [16, 0, 0],
                f: '4 pm'
            }, 9, 7.5],
            [{
                v: [17, 0, 0],
                f: '5 pm'
            }, 10, 10],
        ]);

        var options = {
            chart: {
                title: 'DAILY SALES COMPARISON',
            },
            hAxis: {
                title: 'Time of Day',
                format: 'h:mm a',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            vAxis: {
                title: 'Rating (scale of 1-10)'
            }
        };

        var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
        materialChart.draw(data, options);
    }
</script>