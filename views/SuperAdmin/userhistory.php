<style type="text/css">
    .bays {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
        background-color: white;
    }
</style>

<!DOCTYPE html>
<html>

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


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/defaults-*.min.js"></script>




    <title>ERP</title>
</head>

<body style="overflow-x: hidden;">
    <form action="<?php echo base_url('MasterDataControler/adduser') ?>" method="POST" enctype="multipart/form-data">
        <div class="container-xxl text-white pt-3" style="background-color: purple;">
            <div class="row d-flex justify-content-between">
                <div class="col-1">
                    <a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
                </div>
                <div class="col-7">
                    <p class="tu font-weight-bold " style="font-size: 13px">Admin/Users/User Log</p>
                    <p class="tu font-weight-bold upc" style="font-size: 25px">User Log Activity</p>
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
        <div class="card mt-3" style="margin-left: 5vw;margin-right: 5vw">
            <div class="card-header border-0 bg-white">
                <div class="row d-flex justify-content-between">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body bg-light bays">
                                <div class="d-flex justify-content-between">
                                    <div class="col">
                                        <p>Dari</p>
                                        <input placeholder="Pilih Tanggal" id="datestart" style="cursor: pointer;" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date1">
                                    </div>
                                    <div class="col">
                                        <p>Hingga</p>
                                        <input placeholder="Pilih Tanggal" id="datefinish" style="cursor: pointer;" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date2">
                                    </div>
                                    <div class="col">
                                        <p>User Name</p>
                                        <input type="hidden" id="iduser" value="">
                                        <input type="hidden" id="idrole" value="">
                                        <select class=" selectpicker form-control" data-live-search="true" style="height: 10vh;" onchange="selectname(this.value)">
                                            <option value="" disabled selected>Fullname User</option>
                                            <?php if ($data != "Not Found") : ?>
                                                <?php foreach ($data as $key) : ?>
                                                    <option value="<?php echo json_encode($key['iduser']) ?>"><?php echo $key["fullname"] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <p>User Role</p>
                                        <select class="form-select form-control" aria-label="Default select example" onchange="selectrole(this.value)">
                                            <option selected disabled>User Role</option>
                                            <?php if ($data1 != "Not Found") : ?>
                                                <?php foreach ($data1 as $key) : ?>
                                                    <option value="<?php echo $key["idrole"] ?>"><?php echo $key["namerole"] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                    <div class="col pt-4 d-flex justify-content-between">
                                        <a style="text-decoration: none;color: purple;cursor: pointer;" class="pr-2" onclick="resets()">Reset</a>
                                    </div>
                                    <div class="col pt-3">
                                        <a style="text-decoration: none" class="btn btn-outline-primary" onclick="date()">Apply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-between">
                    <div class="col-9">
                        <div class="card-body p-0">
                            <div class="card-body p-0 ">
                                <table class="table m-0 table-striped table-hover">
                                    <thead class="text-white" style="background-color: purple;">
                                        <tr style="text-align: center;">
                                            <th style="width: 3%;">NO</th>
                                            <th style="width: 10%;">FullName</th>
                                            <th style="width: 10%;">User Role</th>
                                            <th style="width: 10%;">Jam</th>
                                            <th style="width: 20%;">Kegiatan</th>
                                        </tr>
                                    </thead>
                                </table>
                                <div style="overflow-y: scroll; height: 60vh" class="divs">
                                    <table class="table table-striped table-hover" id="body">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3" style="border-color: #eeeeee ; border-radius: 5px">
                        <table class="table m-0">
                            <thead class="text-white" style="background-color: purple;">
                                <tr>
                                    <th style="width:50%">Name User</th>
                                    <th style="width:50%">Role User</th>
                                </tr>
                            </thead>
                        </table>
                        <div style=" height: 44vh; overflow-y: scroll">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <?php foreach ($data3 as $key) : ?>
                                        <tr>
                                            <td><?php echo $key["fullname"] ?></td>
                                            <td><?php echo $key["namerole"] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>

<script type="text/javascript">
    var starts = formatDate(new Date(new Date().setDate(new Date().getDate()-1)));
    var end = formatDate(new Date());
    var data2 = [];

    

    start(starts, end)

    jQuery(function($) {
        $('.divs').on('scroll', function() {
            if ($(this).scrollTop() +
                $(this).innerHeight() >=
                $(this)[0].scrollHeight) {
                var startx = starts;
                starts = formatDate(new Date(new Date(starts).setDate(new Date(starts).getDate()-1)));
                end =  formatDate(new Date(startx));

                start(starts, end)

                console.log(starts+" "+end)
            }
        });
    });

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [year, month, day].join('-');
    }


    function start(starts, end) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('SuperAdminControler/gethistory') ?>",
            data: 'start=' + starts + '&end=' + end,
            dataType: 'json',
            success: function(hasil) {
                baris = ""
                for (let a = 0; a < hasil.length; a++) {
                    data2.push(hasil[a])

                }
                var b = 1;
                for (let a = 0; a < data2.length; a++) {
                    baris += `<tr style="text-align: center;">
                                                    <td style="width: 3%;">` + b++ + `</td>
                                                    <td style="width: 10%;">` + data2[a]["fullname"] + `</td>
                                                    <td style="width: 10%;">` + data2[a]["namerole"] + `</td>
                                                    <td style="width: 10%;">` + data2[a]["datelog"] + `</td>
                                                    <td style="width: 20%;">` + data2[a]["activity"] + `</td>
                                                </tr>`
                }

                $('#body').append(baris)



            }
        });
    }

    function date(x) {
        var data = data2;
        var baris = ""
        var a = 1;
        console.log(data2)
        if ($('#datefinish').val() == "" || $('#datestart').val() == "") {
            alert("Isi Tanggal Dengan Benar")
        } else {

            for (var i = 0; i < data.length; i++) {
                if ($('#datestart').val() <= data[i]["datelog"].substring(0, 10) && data[i]["datelog"].substring(0, 10) <= $('#datefinish').val()) {


                    if ($('#iduser').val() != "" && $('#idrole').val() != "") {

                        if (data[i]["iduser"] == $('#iduser').val()) {

                            if (data[i]["idrole"] == $('#idrole').val()) {
                                baris += `
                                     <tr style="text-align: center;">
                                                <td style="width: 3%;">` + (a++) + `</td>
                                                <td style="width: 10%;">` + data[i]["fullname"] + `</td>
                                                <td style="width: 10%;">` + data[i]["namerole"] + `</td>
                                                <td style="width: 10%;">` + data[i]["datelog"] + `</td>
                                                <td style="width: 20%;">` + data[i]["activity"] + `</td>
                                    </tr>`
                            }

                        }

                    } else if ($('#iduser').val() != "" && $('#idrole').val() == "") {

                        if (data[i]["iduser"] == $('#iduser').val()) {

                            baris += `
                                     <tr style="text-align: center;">
                                                   <td style="width: 3%;">` + (a++) + `</td>
                                                   <td style="width: 10%;">` + data[i]["fullname"] + `</td>
                                                   <td style="width: 10%;">` + data[i]["namerole"] + `</td>
                                                   <td style="width: 10%;">` + data[i]["datelog"] + `</td>
                                                   <td style="width: 20%;">` + data[i]["activity"] + `</td>
                                                   
                                    </tr>

                                `

                        }

                    } else if ($('#iduser').val() == "" && $('#idrole').val() != "") {

                        if (data[i]["idrole"] == $('#idrole').val()) {

                            baris += `
                                     <tr style="text-align: center;">
                                                   <td style="width: 3%;" >` + (a++) + `</td>
                                                   <td style="width: 10%;">` + data[i]["fullname"] + `</td>
                                                   <td style="width: 10%;">` + data[i]["namerole"] + `</td>
                                                   <td style="width: 10%;">` + data[i]["datelog"] + `</td>
                                                   <td style="width: 20%;">` + data[i]["activity"] + `</td>
                                                   
                                    </tr>

                                `

                        }

                    } else if ($('#iduser').val() == "" && $('#idrole').val() == "") {
                        baris += `
                                     <tr style="text-align: center;">
                                                   <td style="width: 3%;" >` + (a++) + `</td>
                                                   <td style="width: 10%;">` + data[i]["fullname"] + `</td>
                                                   <td style="width: 10%;">` + data[i]["namerole"] + `</td>
                                                   <td style="width: 10%;">` + data[i]["datelog"] + `</td>
                                                   <td style="width: 20%;">` + data[i]["activity"] + `</td>
                                                   
                                    </tr>

                                `

                    }


                }


            }



            $('#body').html(baris)


        }

    }


    function back() {
        window.location.href = "<?php echo base_url('SuperAdminControler/User') ?>";
    }


    function selectname(x) {
        var data = data2;
        var baris = ""
        var a = 1;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["iduser"] == x) {
                baris += `
                             <tr style="text-align: center;">
                                           <td style="width: 3%;" >` + (a++) + `</td>
                                           <td style="width: 10%;">` + data[i]["fullname"] + `</td>
                                           <td style="width: 10%;">` + data[i]["namerole"] + `</td>
                                           <td style="width: 10%;">` + data[i]["datelog"] + `</td>
                                           <td style="width: 20%;">` + data[i]["activity"] + `</td>
                                           
                            </tr>

                        `
            }
        }

        $('#iduser').val(x)
        $('#body').html(baris)
    }

    function selectrole(x) {
        var data = data2;
        var baris = ""
        var a = 1;
        for (var i = 0; i < data.length; i++) {
            if (data[i]["idrole"] == x) {
                baris += `
                             <tr style="text-align: center;">
                                           <td style="width: 3%;" >` + (a++) + `</td>
                                           <td style="width: 10%;">` + data[i]["fullname"] + `</td>
                                           <td style="width: 10%;">` + data[i]["namerole"] + `</td>
                                           <td style="width: 10%;">` + data[i]["datelog"] + `</td>
                                           <td style="width: 20%;">` + data[i]["activity"] + `</td>
                                           
                            </tr>

                        `
            }
        }

        $('#body').html(baris)
        $('#idrole').val(x)
    }

    function resets() {
        var data = data2;
        var baris = ""
        var a = 1;
        for (var i = 0; i < data.length; i++) {
            baris += `
                             <tr style="text-align: center;">
                                           <td style="width: 3%;" >` + (a++) + `</td>
                                           <td style="width: 10%;">` + data[i]["fullname"] + `</td>
                                           <td style="width: 10%;">` + data[i]["namerole"] + `</td>
                                           <td style="width: 10%;">` + data[i]["datelog"] + `</td>
                                           <td style="width: 20%;">` + data[i]["activity"] + `</td>
                                           
                            </tr>

                        `
        }

        $('#body').html(baris)
    }
</script>