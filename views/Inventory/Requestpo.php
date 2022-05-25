<?php
$idnew;
if ($data != "Not Found") {
    foreach ($data as $key) {
        $idnew = $key["codereqpo"];
        $idnew++;
    }
} else {
    $idnew = "REQPO-TRS-1";
}
?>
<form action="<?php echo base_url('MasterDataControler/addreqpo') ?>" method="POST" enctype="multipart/form-data" id="form">
    <div class="header px-4 pt-2" style="height: 196px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management</a></li>
                <li class="breadcrumb-item m-0 bc-active" aria-current="page">Request Form</li>
            </ol>
            <h3 class="text-white">Request PO Status</h3>
        </nav>
    </div>
    <div class="content bg-white mx-4">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12 bays">
                    <div class="row">
                        <?php echo $this->session->flashdata('message'); ?>
                        <?php $this->session->set_flashdata('message', ''); ?>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="" class="form-label fs-4 mb-3">Informasi Dasar</label>
                            <div class="row">
                                <div class="col-5">
                                    <div class="row mb-3">
                                        <label for="" class="form-label">No. Request Purchase</label>
                                        <input type="text" name="codereqpo" id="coderequestpo" class="form-control" value="<?php echo $idnew ?>" readonly>
                                        <input type="hidden" name="userid" class="form-control" value="<?php echo $iduser ?>">
                                        <input type="hidden" name="idporeq" class="form-control">
                                    </div>
                                    <div class="row">
                                        <label for="" class="form-label">Due Date (optional)</label>
                                        <input type="date" name="date" id="date1" class="form-control">
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <label for="" class="form-label fs-5">Remark</label>
                                    <textarea name="desc" class="form-control" id="desc" cols="30" rows="5"></textarea>
                                    <div class="text-end">
                                        <span class="text-muted" style="font-size: 10px;">Maksimal 255 Karakter</span>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
                            <label for="" class="form-label fs-3 mb-3">Cetak & Download</label>
                            <div class="row">
                                <div class="col-3">
                                    <button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button>
                                </div>
                                <div class="col-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-12">
                        <h5>Item/Produk</h5>
                        <input type="hidden" id="line-transaksi" name="line-transaksi" value="0" />
                        <table class="table table-bordered table-striped list-akses" id="table-user">
                            <thead>
                                <tr>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Sku</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Nama Item</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Harga</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Qty Request</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Total</td>
                                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Action</td>
                                </tr>
                            </thead>
                            <tbody id="detail">

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-8"></div>
                            <div class="col-4">
                                <div class="card p-3" style="background-color: #E6ECFF;border-radius: 8px">
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Sub Total</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="subtotal" name="subtotal" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>Grand Total</p>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="grandtotal" name="grandtotal" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mr-4 mt-3" style="text-align:right;">
                            <button type="button" class="btn btn-primary" id="addorder" onclick="addorder()" style="font-size:13px;">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
<datalist id="xitem">
    <?php
    if ($data1 != 'Not Found') {
        foreach ($data1 as $key) {
    ?>
            <option value="<?php echo $key["sku"]; ?>" nameitem="<?php echo $key["nameitem"]; ?>" data-iditem="<?php echo $key["iditem"]; ?>" data-price="<?php echo $key["price"]; ?>" data-nameitem="<?php echo $key["nameitem"];  ?>" data-sku="<?php echo $key["sku"]; ?>" data-price="<?php echo $key["price"]; ?>" data-deskripsi="<?php echo $key["deskripsi"]; ?>"><?php echo $key["sku"] . ' - ' . $key["nameitem"]; ?></option>
    <?php }
    } ?>
</datalist>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var iditem = <?php echo json_encode($iditem)  ?>;
    console.log(iditem)
    if (iditem != "") {
        for (let i = 0; i < iditem.length; i++) {
            add_row_transaksi(i)
            var xid = Number(i) + Number(1);
            $('#transaksi_' + xid + '_sku').val(iditem[i]);
            var val = iditem[i];
            var xobj = $('#xitem option').filter(function() {
                return this.value == val;
            });
            $('#transaksi_' + xid + '_sku').val(iditem[i]);
            $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
            $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
            $('#transaksi_' + xid + '_harga').val(xobj.data('price'));
            $('#transaksi_' + xid + '_qty').val(1);
            $('#transaksi_' + xid + '_total').val(xobj.data('price'));

            document.getElementById('transaksi_' + xid + '_qty').readOnly = false;
            document.getElementById('transaksi_' + xid + '_harga').readOnly = false;
            calc();
            console.log(iditem[i])
        }

    } else {
        add_row_transaksi(0)
    }

    $(function() {
        $("#check").click(function() {
            if ($(this).is(":checked")) {
                $("#check").val(1);
            } else {
                $("#check").val(0);
            }
            calc();
        });
    });

    $(document).keypress(function(e) {
        if (e.which == 13) {
            e.preventDefault();
        }
    });

    $('form button').on("click", function(e) {
        if ($(this).attr('id') == "addorder") {
            var xask = '';
            if ($("#idporeq").val() == "") {
                xask = "Simpan Transaksi?";
            } else {
                xask = "Simpan Transaksi?";
            }
            if (confirm(xask)) {
                if (validasi()) {
                    addorder();
                }
            }
        }
        e.preventDefault();
    });

    function validasi() {
        var xval = 0;
        var sts = 1;

        xval = $("#qty").val();
        if ((xval == '0')) {
            alert('Input Produk');
            sts = 0;
            return false;
        }


        if (sts == 1) {
            return true;
        } else {
            return false;
        }
    }

    function addorder() {
        var cx = $('#form').serialize();
        $.post("<?php echo base_url('MasterDataControler/addporeq') ?>", cx,
            function(data) {
                if (data == 'Success') {
                    alert('Input Data Berhasil');
                    cancelorder();
                } else {
                    alert('Input Data Gagal. ' + data);
                }
            });
    }




    function calc() {
        var xcnt = 0;
        var xqty = 0;
        var xid = 0;
        $('input[objtype=sku]').each(function(i, obj) {
            xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
            if ($('#transaksi_' + xid + '_iditem').val() != '') {
                xcnt++;
                xqty += parseFloat($('#transaksi_' + xid + '_qty').val());
            }
        });
    }

    function reorder() {
        $('input[objtype=nourut]').each(function(i, obj) {
            $(this).val(i + 1);
        });
    }

    function del_row_transaksi(xid) {
        $('#transaksi-' + xid + '').remove();
        reorder();
        calc();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#uimg')
                    .attr('src', e.target.result)
                    .width(412)
                    .height(309);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function add_row_transaksi(xxid) {
        var lastid = 0;
        if (parseInt(xxid) != 0) {
            lastid = parseInt($("#transaksi_" + xxid + "_nourut").val());
        }
        var xid = (parseInt(xxid) + 1);
        lastid++;
        var tabel = '';
        tabel += '<tr class="result transaksi-row" style="border:none;"height:1px" id="transaksi-' + xid + '">';
        tabel += '<td style="border:none"height:1px"><input type="hidden" id="transaksi_' + xid + '_iditem"  class="form-control iditem" name="iditem[]" /><input style="width:100%;text-align:center" type="text" class="form-control sku" objtype="sku" id="transaksi_' + xid + '_sku" name="sku[]" placeholder="Search" autocomplete="off" list="xitem" value="" required></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="text" readonly id="transaksi_' + xid + '_nameitem"  class="form-control"name="nameitem[]" value=""/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" readonly id="transaksi_' + xid + '_harga"  class="form-control" name="harga[]" oninput="cal(' + xid + ')" value=""/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" readonly id="transaksi_' + xid + '_qty"  class="form-control" name="qty[]" value="" oninput="cal(' + xid + ')"/></td>';
        tabel += '<td style="border:none"height:1px"><input style="width:100%"type="number" readonly id="transaksi_' + xid + '_total"  class="form-control"name="total[]" value=""/></td>';

        tabel += '<td style="border:none"height:1px" id="transaksi-tr-' + xid + '"><button style="width:60px" id="transaksi_' + xid + '_action" name="action" class="form-control" type="button" onclick="add_row_transaksi(' + xid + ')"><b>+</b></button></td>';
        tabel += '</tr>';
        //return tabel;
        $('#line-transaksi').val(xid);
        $('#detail').append(tabel);
        $('#transaksi_' + xid + '_nourut').val(lastid);
        if (parseInt(xxid) != 0) {
            var olddata = $('#transaksi-tr-' + xxid + '').html();
            var xdt = olddata.replace('onclick="add_row_transaksi(' + xxid + ')"><b>+</b>', 'onclick="del_row_transaksi(' + xxid + ')"><b>x</b>');
            $('#transaksi-tr-' + xxid + '').html(xdt);
        }
    }


    function discountpersent(disc, disc1) {
        if (disc1 > 100) {
            $('#transaksi_' + disc + '_discpersen').val(100);
            alert("Maaf Angka terlalu banyak");

        } else if (disc1 < 1) {
            $('#transaksi_' + disc + '_discpersen').val(0);
            alert("Masukan Discount");
        }

    }



    $(document).on('input', '.sku', function() {
        var xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
        var val = $(this).val();
        var xobj = $('#xitem option').filter(function() {
            return this.value == val;
        });
        if ((val == "") || (xobj.val() == undefined)) {

            $('#transaksi_' + xid + '_iditem').val("");
            $('#transaksi_' + xid + '_nameitem').val("");
            $('#transaksi_' + xid + '_harga').val("");
            $('#transaksi_' + xid + '_qty').val("");
            $('#transaksi_' + xid + '_total').val("");

            document.getElementById('transaksi_' + xid + '_qty').readOnly = true;
            document.getElementById('transaksi_' + xid + '_harga').readOnly = true;
        } else {
            $('#transaksiksi_' + xid + '_sku').val(xobj.data('sku'));
            $('#transaksi_' + xid + '_iditem').val(xobj.data('iditem'));
            $('#transaksi_' + xid + '_nameitem').val(xobj.data('nameitem'));
            $('#transaksi_' + xid + '_harga').val(xobj.data('price'));
            $('#transaksi_' + xid + '_qty').val(1);
            $('#transaksi_' + xid + '_total').val(xobj.data('price'));

            document.getElementById('transaksi_' + xid + '_qty').readOnly = false;
            document.getElementById('transaksi_' + xid + '_harga').readOnly = false;
        }
        calc();
    });





    function cal(x) {
        console.log($('#transaksi_' + x + '_qty').val() + " a " + $('#transaksi_' + x + '_harga').val() + " b ")
        $('#transaksi_' + x + '_total').val($('#transaksi_' + x + '_qty').val() * $('#transaksi_' + x + '_harga').val())
        calc();
    }



    function calc() {
        var xttl = 0;
        var dpp = 0;
        var xid = 0;
        $('input[objtype=sku]').each(function(i, obj) {
            xid = $(this).attr('id').replace("transaksi_", "").replace("_sku", "");
            if ($('#transaksi_' + xid + '_iditem').val() != '') {
                xttl += parseFloat($('#transaksi_' + xid + '_total').val().replaceAll(',', ''));

            }

        });


        if ($("#check").is(":checked") == true) {
            vat = (xttl - $('#disnom').val()) * 11 / 100;
        } else {
            vat = 0;
        }
        grandtot = xttl;

        $("#ppn").val(vat)
        $("#subtotal").val(xttl)
        $("#grandtotal").val(grandtot)

    }

    function cancelorder() {
        location.reload();
    }

    $(document).ready(function() {
        var today = new Date();
        var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate()), 2);
        if ($("#date1").val() == '') {
            $("#date1").val(date);
        }
        var date = today.getFullYear() + '-' + Right('0' + (today.getMonth() + 1), 2) + '-' + Right('0' + (today.getDate() + 1), 2);
        if ($("#date2").val() == '') {
            $("#date2").val(date);
        }
    });
</script>