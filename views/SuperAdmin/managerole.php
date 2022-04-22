<style type="text/css">
    .biodata,
    .photo {
        height: 80vh;
        width: 100%;
    }


    .photo {
        background: purple;
        padding: 20%;
    }

    .biodata {
        background: white;
        padding: 2%;

    }

    .custom-br {
        display: block;
        width: 100%;
        height: 5px;
        background-color: purple;
        /*change color*/

    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .bays {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
        background-color: white;
    }

    .sckk {
        overflow-y: scroll;
        height: 56vh;
        border-radius: 0px 0px 10px 10px;
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
    <title>ERP</title>
</head>

<body style="overflow-x: hidden;">
    <form action="<?php echo base_url('MasterDataControler/editrole') ?>" method="POST" enctype="multipart/form-data">
        <div class="container-xxl text-white pt-3" style="background-color: purple;">
            <div class="row d-flex justify-content-between">
                <div class="col-1">
                    <a class="text-white" style="font-size: 2rem;cursor: pointer;" onclick="back()"> <i class="fa fa-arrow-left" style="padding-top: 2.5rem;padding-left:5rem" aria-hidden="true"></i> </a>
                </div>
                <div class="col-7">
                    <p class="tu font-weight-bold " style="font-size: 13px">Admin/Users/Manage Role</p>
                    <p class="tu font-weight-bold upc" style="font-size: 25px">Manage User Role </p>
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
        <div class="main py-4" style="margin-left:10%;margin-right:10%;">
            <div class="row no-gutters">
                <div class="col-12 bays">
                    <div class="biodata">
                        <div class="row">
                            <?php echo $this->session->flashdata('message'); ?>
                            <?php $this->session->set_flashdata('message', ''); ?>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><b>INFORMASI DASAR</b></p>
                            </div>
                            <div class="col-2" style="margin-top: 5px">
                                <p style="font-size: 12px">Status</p>
                            </div>
                            <div class="col-2">
                                <label class="switch">
                                    <input type="checkbox" checked disabled>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <span class="custom-br"></span>
                        <div class="row pb-3" style="margin-top: 10px">
                            <div class="col">
                                <p style="text-align: center">User Role</p>
                            </div>
                            <div class="col">
                                <input disabled type="text" name="namerole" class="form-control" value="<?php echo $data[0]["namerole"] ?>" required>
                                <input type="hidden" name="idrole" class="form-control" value="<?php echo $data[0]["idrole"] ?>" required>
                            </div>
                        </div>
                        <div class="bays sckk">
                            <table class="table" style="z-index: 10;">
                                <tbody class="bg-white p-2">
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Sales Order</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Sales Order" name="role[]" id="SalesOrder">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Pending List</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Pending List" name="role[]" id="PendingList">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Invoice</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Invoice" name="role[]" id="Invoice">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Buat Penawaran</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Buat Penawaran" name="role[]" id="BuatPenawaran">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">List Quotation</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="List Quotation" name="role[]" id="ListQuotation">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Sales Book</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Sales Book" name="role[]" id="SalesBook">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Terbaru (Gudang Utama)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Terbaru (Gudang Utama)" name="role[]" id="TerbaruGudangUtama">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Request (Gudang Utama)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Request (Gudang Utama)" name="role[]" id="RequestGudangUtama">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Ingoing & Outgoing (Gudang Utama)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Gudang Utama)" name="role[]" id="IngoingOutgoingGudangUtama">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Pindah Gudang (Gudang Utama)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Pindah Gudang (Gudang Utama)" name="role[]" id="PindahGudangGudangUtama">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Paket Bundle Item (Gudang Utama)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Paket Bundle Item (Gudang Utama)" name="role[]" id="PaketBundleItemGudangUtama">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Report (Gudang Utama)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Report (Gudang Utama)" name="role[]" id="ReportGudangUtama">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">CekSN (Gudang Utama)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="CekSN (Gudang Utama)" name="role[]" id="CekSNGudangUtama">
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Product (Gudang Utama)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Product (Gudang Utama)" name="role[]" id="ProductGudangUtama">
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Balance (Gudang Utama)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Balance (Gudang Utama)" name="role[]" id="BalanceGudangUtama">
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Terbaru (Counter)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Terbaru (Counter)" name="role[]" id="TerbaruCounter">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Ingoing & Outgoing (Counter)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Ingoing & Outgoing (Counter)" name="role[]" id="IngoingOutgoingCounter">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Reports (Counter)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Reports (Counter)" name="role[]" id="ReportsCounter">
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pl-4" style="width: 30%;">CekSN (Counter)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="CekSN (Counter)" name="role[]" id="CekSNCounter">
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Stok Inventory (Counter)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Stok Inventory (Counter)" name="role[]" id="StokInventoryCounter">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Delivery Order (Counter)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Delivery Order (Counter)" name="role[]" id="DeliveryOrderCounter">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Purchase Order</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Purchase Order" name="role[]" id="PurchaseOrder">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Report</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Report" name="role[]" id="Report">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Purchase Order Book</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Purchase Order Book" name="role[]" id="PurchaseOrderBook">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Admin</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Admin" name="role[]" id="Admin">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">User</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="User" name="role[]" id="User">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Items</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Items" name="role[]" id="Items">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Location Item</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Location Item" name="role[]" id="LocationItem">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Warehouse</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Warehouse" name="role[]" id="Warehouse">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Customer</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Customer" name="role[]" id="Customer">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Supplier</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Supplier" name="role[]" id="Supplier">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Currancy</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Currancy" name="role[]" id="Currancy">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Unit</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Unit" name="role[]" id="Unit">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Bank</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Bank" name="role[]" id="Bank">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Company Profile</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Company Profile" name="role[]" id="CompanyProfile">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4" style="width: 30%;">Ingoing Initial(Gudang Utama)</td>
                                        <td style="width: 14%;text-align:center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Ingoing Initial(Gudang Utama)" name="role[]" id="IngoingInitialGudangUtama">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12 pt-5">
                                <button class="btn btn-outline-success col-2" style="float: right;" type="submit"> <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>

<script type="text/javascript">
    function back() {
        window.location.href = "<?php echo base_url('SuperAdminControler/User') ?>";
    }

    var data = <?php echo json_encode($data) ?>;
    console.log(data)
    for (var i = 0; i < data.length; i++) {
        if (data[i]["data"] != "Not Found") {
            for (var x = 0; x < data[i]["data"].length; x++) {
                console.log(data[i]["data"][x]["menu"].replaceAll(" ", "").replaceAll("(", "").replaceAll(")", "").replaceAll("&", ""))
                $('#' + data[i]["data"][x]["menu"].replaceAll(" ", "").replaceAll("(", "").replaceAll(")", "").replaceAll("&", "")).prop('checked', true);
            }
        }
    }
</script>