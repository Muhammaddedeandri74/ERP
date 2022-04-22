<style type="text/css">
    .fw {
        font-weight: bold;
    }

    .fn {
        font-weight: normal;
    }

    .bay {
        box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }

    .cn {
        text-align: center;
    }
</style>

<div class="container-xxl pb-2 pt-1" style="padding-left: 6vw;background-color : #3C2E8F">
    <p class="text-white font-weight-bold py-2 pl-2" style="font-size: 13px">GUDANG / Inventory In page</p>
    <p class="text-white font-weight-bold pl-2" style="font-size: 25px">INVENTORY IN</p>
</div>

<div class="container-xxl ml-5">
    <div class=" card border-0">
        <div class="card-header border-0 bg-transparent">
            <div class="row d-flex justify-content-between">
                <div class="col-10 pl-5">
                    <a href="<?= base_url('InOut/invin') ?>" class="btn bay fw btn-transparent">INVENTORY IN</a>
                    <a href="<?= base_url('InOut/invinret') ?>" class="btn fw btn-transparent">INVENTORY OUT</a>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div class="card-body ml-4">
            <?php echo $this->session->flashdata('message'); ?>
            <?php $this->session->set_flashdata('message', ''); ?>
            <div class="card bay p-4" width="80%">
                <div class="card-header border-0 bg-white">
                    <div class="row d-flex justify-content-between">
                        <div class="col-3">

                        </div>
                        <div class="col-6" style="padding-left: 18vw;">
                            <div class="col">
                                <label>TIPE IN</label>
                                <a style="margin-left: 2vw;" href="<?= base_url('InOut/invin') ?>" class="btn bay fw btn-transparent">Supplier</a>
                                <a href="<?= base_url('InOut/invinret') ?>" class="btn fw btn-transparent ">Return</a>
                            </div>
                        </div>
                        <div class="col-3">

                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-1-half pt-2 pl-3">
                            <P class="fw">Filter Pencarian</P>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" oninput="searchx(this.value)" name="search" id="search" placeholder="&#xF002; Cari Berdasarkan Supplier dan lainnya" style="font-family:Arial, FontAwesome">
                        </div>
                        <div class="col-2"></div>
                        <div class="col-3">
                        </div>
                        <div class="col-2">
                            <a href="<?php echo base_url('InOut/newinvin') ?>" class="btn btn-outline-primary" style="float :right"><b>+ Inventory In</b></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table cn">
                        <thead style="background-color: #3C2E8F;color: white">
                            <tr>
                                <th>NO </th>
                                <th>Trans NO</th>
                                <th>Order NO</th>
                                <th>Trans Date</th>
                                <th>Supplier</th>
                                <th>Item Count</th>
                                <th>Deskripsi</th>
                                <th>No. Surat Jalan</th>
                                <th>No. Invoice</th>
                                <th>Issue By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="xdetail">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="javascript">
    function searchx(x) {
        var data = <?php echo json_encode($data) ?>;
        var baris = "";
        var ix = 0;
        var x1 = 0;
        for (var i = 0; i < data.length; i++) {
            if ((data[i]["codein"].toLowerCase().includes(x.toLowerCase())) || (data[i]["codepo"].toLowerCase().includes(x.toLowerCase())) || (data[i]["namesupp"].toLowerCase().includes(x.toLowerCase())) || (data[i]["nameuser"].toLowerCase().includes(x.toLowerCase())) || (data[i]["descinfo"].toLowerCase().includes(x.toLowerCase()))) {
                x1 = formatnum(parseFloat(data[i]["itemin"]).toFixed(0));
                ix = (ix + 1);
                if (i % 2 == 0) {
                    baris += '<tr style="cursor: pointer;">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codein"] + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["datein"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + +'</td>';
                    baris += '<td>' + +'</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '<td><a href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '" class="btn btn-warning">Edit</a></td>';
                    baris += '</tr>';
                } else {
                    baris += '<tr style="background:#eeeeee; cursor: pointer;">';
                    baris += '<td>' + ix + '</td>';
                    baris += '<td>' + data[i]["codein"] + '</td>';
                    baris += '<td>' + data[i]["codepo"] + '</td>';
                    baris += '<td>' + data[i]["datein"] + '</td>';
                    baris += '<td>' + data[i]["namesupp"] + '</td>';
                    baris += '<td>' + x1 + '</td>';
                    baris += '<td>' + data[i]["descinfo"] + '</td>';
                    baris += '<td>' + +'</td>';
                    baris += '<td>' + +'</td>';
                    baris += '<td>' + data[i]["nameuser"] + '</td>';
                    baris += '<td><a href="<?php echo base_url('InOut/changeinvin?idtrans=') ?>' + btoa(data[i]["idin"]) + '" class="btn btn-warning">Edit</a></td>';
                    baris += '</tr>';
                }
            }
        }

        $('#xdetail').html(baris);
        console.log(baris)
    }
    searchx('');
    $('form button').on("click", function(e) {
        e.preventDefault();
    });
</script>