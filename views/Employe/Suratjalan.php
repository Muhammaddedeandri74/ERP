<style>
    .bays {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.9);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.9);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.9);
        background-color: white;
    }

    .center {
        margin: auto;
        width: 94%;
        padding: 10px;
    }

    .fw {
        font-weight: bold;
        color: purple;
        font-size: 36px;
        opacity: 0.6;
        text-align: center;
    }

    .fb {
        text-align: center;
        font-size: 22px;
    }

    .mdc {
        font-weight: bold;
        font-size: 20px;
        text-align: center;
    }

    .tc {
        text-align: center;
    }

    .tr {
        text-align: right;
    }
</style>

<head>
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url('assets/css/indexxxx.css') ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="<?= base_url('assets/js/Chart.js') ?>"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ERP</title>
</head>

<body class="bg-light">
    <div class="container-xxl center">
        <div class=" row">
            <div class="col">
                <div class="card bays">
                    <div class="card-header bg-white">
                        <div class="row d-flex justify-content-between p-3">
                            <div class="col-3">
                                <img src="<?= base_url('assets/img/df.png') ?>" style="opacity: 0.8;width:14vw" alt="">
                            </div>
                            <div class="col-7">
                                <p class="fw">PT. DAFFINA RITELINDO SEMESTA</p>
                                <p class="text-muted fb">OLEOS 2 BUILDING 8th Floor, Zona A Jalan Kebagusan 1 Kav 6, RT.2/RW.1, Kebagusan, Ps. Minggu Jakarta Selatan, 12520 Tel: 021- 2940662</p>
                            </div>
                            <div class="col-2">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-2">
                            </div>
                            <div class="col-4">
                                <div class="input-group flex-nowrap">
                                    <p class="col-sm-4 mt-2" style="text-align: right;">TO :</p>
                                    <p class="mt-2">PT. DRS</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 mt-2" style="text-align: right;">ALAMAT :</p>
                                    <p class="mt-2">Jl. Asia Tenggara sebelah timur sedikit 12112</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <p class="col-sm-4 mt-2" style="text-align: right;">No.SJ :</p>
                                    <p class="mt-2">Sj14045</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 mt-2" style="text-align: right;">NO.ORDER :</p>
                                    <p class="mt-2">S14045</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 mt-2" style="text-align: right;">DATE :</p>
                                    <p class="mt-2">21/12/2021</p>
                                </div>
                            </div>
                            <div class="col-2">

                            </div>
                            <div class="col">
                                <p class="mdc"> <u style="2px solid black">SURAT JALAN</u> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table border">
                                    <thead class="border">
                                        <tr>
                                            <th class="border tc" style="width: 2%;" scope="col">NO</th>
                                            <th class="border tc" style="width: 35%;" scope="col">NAMA PRODUCT</th>
                                            <th class="border tc" style="width: 18%;" scope="col">SKU</th>
                                            <th class="border tc" style="width: 25%;" scope="col">DESCRIPTION</th>
                                            <th class="border tc" style="width: 10%;" scope="col">UNIT</th>
                                            <th class="border tc" style="width: 10%;" scope="col">QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border tc">1</td>
                                            <td class="border">Mark</td>
                                            <td class="border tr">Otto</td>
                                            <td class="border tc">@mdo</td>
                                            <td class="border">@mdo</td>
                                            <td class="border tr">@mdo</td>
                                        </tr>
                                        <tr>
                                            <td class="border tc">2</td>
                                            <td class="border">Mark</td>
                                            <td class="border tr">Otto</td>
                                            <td class="border tc">@mdo</td>
                                            <td class="border">@mdo</td>
                                            <td class="border tr">@mdo</td>
                                        </tr>
                                        <tr>
                                            <td class="border tc">3</td>
                                            <td class="border">Mark</td>
                                            <td class="border tr">Otto</td>
                                            <td class="border tc">@mdo</td>
                                            <td class="border">@mdo</td>
                                            <td class="border tr">@mdo</td>
                                        </tr>
                                        <tr>
                                            <td class="border tc">4</td>
                                            <td class="border">Mark</td>
                                            <td class="border tr">Otto</td>
                                            <td class="border tc">@mdo</td>
                                            <td class="border">@mdo</td>
                                            <td class="border tr">@mdo</td>
                                        </tr>
                                        <tr>
                                            <td class="border tc">5</td>
                                            <td class="border">Mark</td>
                                            <td class="border tr">Otto</td>
                                            <td class="border tc">@mdo</td>
                                            <td class="border">@mdo</td>
                                            <td class="border tr">@mdo</td>
                                        </tr>
                                        <tr>
                                            <td class="border tc">6</td>
                                            <td class="border">Mark</td>
                                            <td class="border tr">Otto</td>
                                            <td class="border tc">@mdo</td>
                                            <td class="border">@mdo</td>
                                            <td class="border tr">@mdo</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pt-3">
                            <p class="tc">NOTE : ............................................................................................................................................................................................................................................................................................................................................................................................................................................</p>
                        </div>
                        <div class="row d-flex justify-content-between" style="padding-bottom: 20vh;">
                            <div class="col-3"></div>
                            <div class="col-3">
                                <p>PEMERIKSA</p><br><br>
                                <p>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
                            </div>
                            <div class="col-3">
                                <p>PENGIRIM</p><br><br>
                                <p>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
                            </div>
                            <div class="col-3">
                                <p>PENERIMA</p><br><br>
                                <p>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>