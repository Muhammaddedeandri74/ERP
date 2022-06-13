<form action="<?php echo base_url('InventoryController/PoStatus') ?>" method="POST" enctype="multipart/form-data" id="form">
  <div class="header px-4 pt-2" style="height: 196px;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Purchase Management </a></li>
        <li class="breadcrumb-item m-0 bc-active" aria-current="page">Purchase Order</li>
      </ol>
      <h3 class="text-white">Purchase Order Status</h3>
    </nav>
  </div>
  <input type="hidden" name="idpo" id="idpo">
  <input type="hidden" name="codepo" id="codepo">
  <div class="content bg-white mx-4">
    <div class="container-fluid">
      <div class="row no-gutters">
        <div class="col-12 bays">
          <div class="row">
            <?php echo $this->session->flashdata('message'); ?>
            <?php $this->session->set_flashdata('message', ''); ?>
          </div>
          <div class="row mb-3">
            <div class="col-4">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Pencarian</label>
                <div class="input-group">
                  <div class="col-4">
                    <select name="filter" value="" class="form-select form-control bg-primary text-white" aria-label="Default select example" id="filter">
                      <option value="codepo">No.Purchase</option>
                      <option value="namecust">Nama Customer</option>
                      <option value="deskripsi">Judul Purchase</option>
                    </select>
                  </div>
                  <div class="col-8">
                    <input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan Filter..">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-1"></div>
            <div class="col-7">
              <div class="row">
                <div class="col-3">
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <select class="form-select" id="statuspo" aria-label="Default select example">
                      <option value="">Pilih Status PO</option>
                      <option value="Waiting">Waiting</option>
                      <option value="Process">Process</option>
                      <option value="Finish">Finish</option>
                      <option value="Cancel">Cancel</option>
                    </select>
                  </div>
                </div>
                <div class="col-3">
                  <div class="mb-3">
                    <label for="" class="form-label">Mulai Dari</label>
                    <input type="date" class="form-control" name="" id="datestart" value="<?php echo date('Y-m-01') ?>">
                  </div>
                </div>
                <div class="col-3">
                  <div class="mb-3">
                    <label for="" class="form-label">Sampai Dengan</label>
                    <input type="date" class="form-control" name="" id="finishdate" value="<?php echo date('Y-m-t') ?>">
                  </div>
                </div>
                <div class="col-3 mt-3">
                  <p></p>
                  <a href="#" class="btn btn-primary" onclick="loaddata()">Terapkan</a>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-1">
          </div>
          <div class="row mb-5" style="overflow-x: auto;">
            <h5>Item/Produk</h5>
            <table class="table table-bordered table-striped list-akses p-0 m-0 " id="table-user">
              <thead class="text-white" style="background:#1143d8">
                <tr>
                  <td>No. Purchase</td>
                  <td>Supplier</td>
                  <td>Judul Purchase</td>
                  <td>Tgl. Transaksi</td>
                  <td>Tgl. Delivery</td>
                  <td>Mata Uang</td>
                  <td>Total</td>
                  <td>Status</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody id="detailx">
                <tr>
                  <td>as</td>
                  <td>as</td>
                  <td>as</td>
                  <td>as</td>
                  <td>as</td>
                  <td>as</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="6">Total</td>
                  <td id="total">Rp. 181,120</td>
                </tr>
              </tfoot>
            </table>
            <table class="table p-0 m-0">
              <tbody style="background-color: #0000001E;">
                <tr>
                  <td>
                    <div class="row">
                      <label for="" class="form-label">Report</label>
                      <div class="col-6">
                        <a class="btn btn-light" id="btn_exportexcel"><i class='bx bxs-download'>Download</i></a>
                      </div>
                      <div class="col-5">
                        <a class="btn btn-light" onclick="printdata()"><i class='bx bx-printer'>Cetak</i></a>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="row">
                      <label for=""><i style="color: blue" class='bx bxs-circle'></i> Total Semua Purchase Order</label>
                      <p id="all">0</p>
                    </div>
                  </td>
                  <td>
                    <div class="row">
                      <label for=""><i style="color: yellow" class='bx bxs-circle'></i> Total Status Purchase Waiting</label>
                      <p id="waiting">0</p>
                    </div>
                  </td>
                  <td>
                    <div class="row">
                      <label for=""><i style="color: orange" class='bx bxs-circle'></i> Total Status Purchase Proses</label>
                      <p id="process">0</p>
                    </div>
                  </td>
                  <td>
                    <div class="row">
                      <label for=""><i style="color: green" class='bx bxs-circle'></i> Total Status Purchase Finish</label>
                      <p id="finish">0</p>
                    </div>
                  </td>
                  <td>
                    <div class="row">
                      <label for=""><i style="color: red" class='bx bxs-circle'></i> Total Status Purchase Cancel</label>
                      <p id="cancel">0</p>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="background:#1143d8;color:white;">
        <h5 class="modal-title" id="exampleModalLabel">DETAIL PURCHASE ORDER</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-2" style="margin-left: 1vw">
            <label for="" class="form-label">No. Purchase Order</label>
            <p id="codepox"></p>
          </div>
          <div class="col-2">
            <label for="" class="form-label">Supplier</label>
            <p id="namecustx"></p>
          </div>
          <div class="col-2">
            <label for="" class="form-label">Tgl. Transaksi</label>
            <p id="datepox"></p>
          </div>
          <div class="col-2">
            <label for="" class="form-label">Tgl. Pengiriman</label>
            <p id="delivedatex"></p>
          </div>
          <div class="col-1">
            <label for="" class="form-label">Status</label>
            <p id="statuspox"></p>
          </div>
          <div class="col-1" id="">
            <label for="" class="form-label">Edit PO</label>
            <!-- <a href="#" name="submit" onclick="editx()" class="btn btn-outline-primary" style="font-size:10px; width:auto;">Edit Po</a> -->
            <p id="btnx"></p>
          </div>
        </div>
        <div class="row mx-3" style="overflow-x: auto;">
          <table class="table table-bordered table-striped" id="table-user">
            <thead>
              <tr>
                <td>No. Purchase Order</td>
                <td>SKU</td>
                <td>Name Item</td>
                <td>Spesifikasi</td>
                <td>Harga</td>
                <td>QTY</td>
                <!-- <td>VAT</td> -->
                <td>Diskon</td>
                <td>Total</td>
              </tr>
            </thead>
            <tbody id="xdetails">
            </tbody>
          </table>
        </div>

        <div class="row">
          <div class="col-8"></div>
          <div class="col-4">
            <div class="row">
              <div class="col-6 text-end">
                <p>Sub Total</p>
              </div>
              <div class="col-6">
                <p id="subtotalx"></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6 text-end">
                <p>Diskon Transaksi</p>
              </div>
              <div class="col-6">
                <p id="distransx">Rp. -</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6 text-end">
                <p>Total</p>
              </div>
              <div class="col-6">
                <p id="total">Rp. -</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6 text-end">
                <p>VAT</p>
              </div>
              <div class="col-6">
                <p id="vatx">Rp. -</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6 text-end">
                <p>Grand Total</p>
              </div>
              <div class="col-6">
                <p id="grandtotalx">Rp. -</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" id="cancel" onclick="cancelorder()">Cancel Purchase Order</button>
      </div>
    </div>
  </div>
</div>
<pre id="result" style="display: none"></pre>
<div class="excel" id="excel">
</div>
<div class="data" id="data">
  <table class="table table-striped table-hover">
    <thead style="background: purple">
      <tr>
        <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">#</td>
        <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">No. Purchase</td>
        <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Supplier</td>
        <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Tgl. Transaksi</td>
        <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Tgl. Delivery</td>
        <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Mata Uang</td>
        <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Harga</td>
        <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Total</td>
        <td style="border:solid;background-color:#1143d8;color:white;text-align:center;min-width: auto;">Status</td>
      </tr>
    </thead>
    <tbody id="printt">
      <?php if ($data != "Not Found") { ?>
        <?php $a = 1;
        foreach ($data as $key) : ?>
          <tr>
            <td style="border:solid;"><?php echo $a++ ?></td>
            <td style="border:solid;"><?php echo $key["codepo"] ?></td>
            <td style="border:solid;"><?php echo $key["namecust"] ?></td>
            <td style="border:solid;"><?php echo $key["datepo"] ?></td>
            <td style="border:solid;"><?php echo $key["delivedate"] ?></td>
            <td style="border:solid;"><?php echo $key["namecomm"] ?></td>
            <td style="border:solid;"><?php echo number_format($key['price'], 0, '.', ',') ?></td>
            <td style="border:solid;"><?php echo number_format($key['grandtotal'], 0, '.', ',') ?></td>
            <td style="border:solid;">
              <center>
                <?php if ($key["statuspo"] == "Waiting") : ?>
                  <p style="background-color:#E6ECFF;width:fit-content;text-color:#1143D8;" class="fs-6 px-3 rounded-pill"> <?php echo $key["statuspo"] ?></p>
                <?php elseif ($key["statuspo"] == "Process") : ?>
                  <p style="background-color:#FCAA25;width:fit-content;text-color:white;" class="fs-6 px-3 text-white rounded-pill"> <?php echo $key["statuspo"] ?></p>
                <?php elseif ($key["statuspo"] == "Finish") : ?>
                  <p style="background-color:#A6FFC6;width:fit-content;text-color:#008F43;" class="fs-6 px-3 rounded-pill"> <?php echo $key["statuspo"] ?></p>
                <?php elseif ($key["statuspo"] == "Cancel") : ?>
                  <p style="background-color:red;width:fit-content;text-color:red;" class="fs-6 px-3 rounded-pill"> <?php echo $key["statuspo"] ?></p>
                <?php else : ?>
                  <p style="background-color:red;width:fit-content;text-color:red;" class="fs-6 px-3 rounded-pill"> <?php echo $key["statuspo"] ?></p>
                <?php endif ?>
              </center>
            </td>
          </tr>
        <?php endforeach ?>
      <?php } ?>
    </tbody>
  </table>
</div>
<form action="<?php echo base_url('MasterDataControler/getdatapobyid') ?>" method="POST" id="forms">
  <input type="hidden" id="idpox" name="idpox">
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
  loaddata()
  $('#data').hide();

  function editx() {
    $('#forms').submit();
  }

  function loaddata() {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('InventoryController/getlistpostatus') ?>",
      data: "filter=" + $('#filter').val() + "&search=" + $('#search').val() + "&statuspo=" + $('#statuspo').val() + "&datestart=" + $('#datestart').val() + "&finishdate=" + $('#finishdate').val(),
      dataType: "JSON",
      success: function(hasil) {
        console.log(hasil)
        var baris = ""
        var bar = ""
        grandtotal = 0
        waiting = 0
        finish = 0
        cancel = 0
        process = 0
        if (hasil != "Not Found") {
          for (let i = 0; i < hasil.length; i++) {

            baris += `  <tr>
                                            <td>` + hasil[i]["codepo"] + `</td>
                                            <td>` + hasil[i]["namecust"] + `</td>
                                            <td>` + hasil[i]["deskripsi"] + `</td>
                                            <td>` + hasil[i]["datepo"] + `</td>
                                            <td>` + hasil[i]["delivedate"] + `</td>
                                            <td>` + hasil[i]["delivedate"] + `</td>
                                            <td>Rp. ` + formatnum(parseFloat(hasil[i]["grandtotal"]).toFixed(0)) + `</td>
                                            <td>` + hasil[i]["statuspo"] + `</td>
                                            <td><a onclick="cekdetail(` + hasil[i]["idpo"] + `)" class="btn btn-primary" style="font-size: 12px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Detail</a></td>
                                           
                                        </tr>`
            if (hasil[i]["statuspo"] == "Waiting") {
              bar += `<a href="#" name="submit" onclick="editx()" class="btn btn-outline-primary" style="font-size:10px; width:auto;">Edit Po</a>`;
            } else if (hasil[i]["statuspo"] == "Process") {

            } else if (hasil[i]["statuspo"] == "Finish") {

            }

            grandtotal = Number(grandtotal) + Number(hasil[i]["grandtotal"])

            if (hasil[i]["statuspo"] == "Waiting") {
              waiting = Number(waiting) + Number(hasil[i]["grandtotal"])
            }

            if (hasil[i]["statuspo"] == "Process") {
              process = Number(process) + Number(hasil[i]["grandtotal"])
            }

            if (hasil[i]["statuspo"] == "Cancel") {
              cancel = Number(cancel) + Number(hasil[i]["grandtotal"])
            }
            if (hasil[i]["statuspo"] == "Finish") {
              finish = Number(finish) + Number(hasil[i]["grandtotal"])
            }


          }

        }
        $('#detailx').html(baris)
        $('#btnx').html(bar);
        $('#total').html(formatRupiah(grandtotal + " ", "Rp."))
        $('#all').html(formatRupiah(grandtotal + " ", "Rp."))
        $('#waiting').html(formatRupiah(waiting + "", "Rp."))
        $('#process').html(formatRupiah(process + "", "Rp."))
        $('#finish').html(formatRupiah(finish + "", "Rp."))
        $('#cancel').html(formatRupiah(cancel + "", "Rp."))
      }

    });
  }

  function cancelorder() {
    if (confirm("Apakah Anda Yakin ingin membatalkan Purchase ini ?")) {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('InventoryController/cancelpo') ?>",
        data: 'codepo=' + $('#codepo').val(),
        dataType: 'JSON',
        success: function(hasil) {
          if (hasil == 'Success') {
            location.reload()
          } else {
            alert(hasil);
          }
        }
      });
    }
  }

  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }


  function cekdetail(x) {
    var data = <?php echo json_encode($data) ?>;
    var baris = "";
    var bar = "";
    var barx = "";
    var ix = 1;
    for (var i = 0; i < data.length; i++) {
      if (data[i]["idpo"] == x) {

        $('#codepox').html(data[i]["codepo"]);
        $('#idpo').val(data[i]["idpo"]);
        $('#idpox').val(data[i]["idpo"]);
        $('#codepo').val(data[i]["codepo"]);
        $('#namecustx').html(data[i]["namecust"]);
        $('#datepox').html(data[i]["datepo"]);
        $('#delivedatex').html(data[i]["delivedate"]);
        $('#statuspox').html(data[i]["statuspo"]);

        $('#subtotalx').html(formatnum(data[i]["subtotal"]));
        $('#distransx').html(formatnum(data[i]["disctrans"]));
        $('#total').html(formatnum(data[i]["total"]));
        $('#vatx').html(formatnum(data[i]["vat"]));
        $('#grandtotalx').html(formatnum(data[i]["grandtotal"]));

        if (data[i]["statuspo"] == "Waiting") {
          bar += `<a href="#" name="submit" onclick="editx()" class="btn btn-outline-primary" style="font-size:10px; width:auto;">Edit Po</a>`;
        } else if (data[i]["statuspo"] == "Process") {

        } else if (data[i]["statuspo"] == "Finish") {

        }

        for (var a = 0; a < data[i]["data"].length; a++) {
          baris += '<tr>';
          baris += '<td>' + data[i]["data"][a]["codepo"] + '</td>';
          baris += '<td>' + data[i]["data"][a]["sku"] + '</td>';
          baris += '<td>' + data[i]["data"][a]["nameitem"] + '</td>';
          baris += '<td>' + data[i]["data"][a]["deskripsi"] + '</td>';
          baris += '<td>' + formatnum(parseFloat(data[i]["data"][a]["price"]).toFixed(0)) + '</td>';
          baris += '<td>' + data[i]["data"][a]["qty"] + '</td>';
          baris += '<td>' + formatnum(parseFloat(data[i]["data"][a]["disctrans"]).toFixed(0)) + '</td>';
          baris += '<td>' + formatnum(parseFloat(data[i]["data"][a]["grandtotalx"]).toFixed(0)) + '</td>';
          baris += '</tr>';
        }
        break;
      }
    }
    $('#xdetails').html(baris);
    $('#btnx').html(bar);
    $('#btnxx').html(barx);
  }

  function printdata() {
    var printContents = document.getElementById('data').innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }

  $("#btn_exportexcel").click(function(e) {
    let file = new Blob([$('.data').html()], {
      type: "application/vnd.ms-excel"
    });
    console.log(file)
    let url = URL.createObjectURL(file);
    let a = $("<a />", {
      href: url,
      download: "Purchase Order.xls"
    }).appendTo("body").get(0).click();
    e.preventDefault();
  });
</script>