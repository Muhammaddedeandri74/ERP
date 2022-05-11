<form action="<?php echo base_url('InventoryController/PoStatus') ?>" method="POST">
  <div class="header px-4 pt-2" style="height: 196px;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Purchase Management </a></li>
        <li class="breadcrumb-item m-0 bc-active" aria-current="page">Purchase Order</li>
      </ol>
      <h3 class="text-white">Purchase Order Status</h3>
    </nav>
  </div>
  <div class="content bg-white mx-4">
    <div class="container-fluid">
      <div class="row no-gutters">
        <div class="col-12 bays">
          <div class="biodata">
            <div class="row">
              <?php echo $this->session->flashdata('message'); ?>
              <?php $this->session->set_flashdata('message', ''); ?>
            </div>
            <div class="row">
              <div class="col d-flex align-middle mb-3" style="align-items:center"><i class='bx bx-left-arrow-alt' style="font-size:2rem;"></i>
                <a style="text-decoration:none;color:black;" href="<?php echo base_url('AuthControler/mainpage') ?>">Kembali</a>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <label class="fs-5 mb-3">Informasi Dasar</label>
                <div class="row mb-3">
                  <div class="col-8">
                    <label for="">No. Purchase Order</label>
                    <input type="text" name="codepo" class="form-control" value="" autocomplete="off">
                  </div>
                  <div class="col-4 mt-2">
                    <p></p>
                    <button class="btn btn-outline-primary" style="height:36px;font-size:13px;">Cari Data</button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <label for="">Supplier</label>
                    <select name="namesupp" id="" class="form-select" required>
                      <option value="">Pilih</option>
                      <?php if ($data2 != "Not Found") : ?>
                        <?php foreach ($data2 as $key) : ?>
                          <option value="<?php echo $key["namesupp"] ?>"><?php echo $key["namesupp"] ?></option>
                        <?php endforeach ?>
                      <?php endif ?>
                    </select>
                  </div>
                  <div class="col-4"></div>
                </div>
              </div>
              <div class="col-5">
                <label class="fs-5 mb-3">Informasi Gudang & Mata Uang </label>
                <div class="row mb-3">
                  <div class="col-4">
                    <label for="">Tipe Periode</label>
                    <select name="filter" <?= set_value('filter') ?> id="" class="form-select">
                      <option value="datepo">Tanggal PO</option>
                      <option value="delivedate">Tanggal Delivery</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <label for="">Mulai Dari</label>
                    <input type="date" class="form-control" name="date1" id="date1" value="<?= set_value('date1') ?>">
                  </div>
                  <div class="col-4">
                    <label for="">Sampai Dengan</label>
                    <input type="date" class="form-control" name="date2" id="date2" value="<?= set_value('date2') ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-8">
                    <label for="">Status Purchase Order</label>
                    <select name="status" id="" class="form-select">
                      <option value="">Pilih</option>
                      <option value="Waiting">Waiting</option>
                      <option value="Process">Process</option>
                      <option value="Finish">Finish</option>
                      <option value="Cancel">Cancel</option>
                    </select>
                  </div>
                  <div class="col-4"></div>
                </div>
                <div class="d-flex mb-3">
                  <div class="me-3">
                    <a href="<?php echo base_url('InventoryController/PoStatus') ?>" class="btn btn-danger">Reset</a>
                    <button name="submit" name="submit" class="btn btn-primary">Pencarian</button>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <label class="fs-5 mb-3">Cetak & Download</label>
                <div class="row">
                  <div class="col-3 mt-2">
                    <p></p>
                    <button class="btn btn-light"><i class='bx bxs-download'>Download</i></button>
                  </div>
                  <div class="col-3 mt-2">
                    <p></p>
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
            <div class="row mb-5" style="overflow-x: auto;">
              <h5>Item/Produk</h5>
              <table class="table table-bordered table-striped list-akses" id="table-user">
                <thead>
                  <tr>
                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">#</td>
                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">No. Purchase</td>
                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Supplier</td>
                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Tgl. Transaksi</td>
                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Tgl. Delivery</td>
                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Mata Uang</td>
                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Harga</td>
                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">VAT</td>
                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Total</td>
                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Status</td>
                    <td style="background:#1143d8;color:white;text-align:center;min-width: auto;">Action</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($data != "Not Found") { ?>
                    <?php $a = 1;
                    foreach ($data as $key) : ?>
                      <tr>
                        <td><?php echo $a++ ?></td>
                        <td><?php echo $key["codepo"] ?></td>
                        <td><?php echo $key["namesupp"] ?></td>
                        <td><?php echo $key["datepo"] ?></td>
                        <td><?php echo $key["delivedate"] ?></td>
                        <td><?php echo $key["namecomm"] ?></td>
                        <td><?php echo $key["price"] ?></td>
                        <td>
                          <?php if ($key["vat"]) : ?>
                            <p>Yes</p>
                          <?php else : ?>
                            <p>No</p>
                          <?php endif ?>
                        </td>
                        <td><?php echo $key["grandtotal"] ?></td>
                        <td>
                          <center>
                            <?php if ($key["statuspo"] == "Waiting") : ?>
                              <p style="background-color:#E6ECFF;width:fit-content;text-color:#1143D8;" class="fs-6 px-3 rounded-pill"> <?php echo $key["statuspo"] ?></p>
                            <?php elseif ($key["statuspo"] == "Process") : ?>
                              <p style="background-color:#FCAA25;width:fit-content;text-color:white;" class="fs-6 px-3 text-white rounded-pill"> <?php echo $key["statuspo"] ?></p>
                            <?php elseif ($key["statuspo"] == "Finish") : ?>
                              <p style="background-color:#A6FFC6;width:fit-content;text-color:#008F43;" class="fs-6 px-3 rounded-pill"> <?php echo $key["statuspo"] ?></p>
                            <?php endif ?>
                          </center>
                        </td>
                        <td>
                          <center><a style="height:36px;font-size:13px;" onclick="cekdetail(<?= $key['idpo'] ?>)" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Detail</a></center>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background:#1143d8;color:white;">
          <h5 class="modal-title" id="exampleModalLabel">DETAIL DATA PURCHASE ORDER</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close" style="background:#1143d8;color:white;"></button>
        </div>
        <div class="modal-body">
          <div class="row mx-3" style="overflow-x: auto;">
            <table class="table table-bordered table-striped" id="table-user">
              <thead>
                <tr>
                  <td>#</td>
                  <td>Nama Item</td>
                  <td>SKU</td>
                  <td>Desc</td>
                  <td>Harga</td>
                </tr>
              </thead>
              <tbody id="xdetails">

              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  function cekdetail(x) {
    var data = <?php echo json_encode($data) ?>;
    var baris = "";
    var ix = 1;
    console.log(data)
    for (var i = 0; i < data.length; i++) {
      if (data[i]["idpo"] == x) {
        for (var a = 0; a < data[i]["data"].length; a++) {
          baris += '<tr>';
          baris += '<td scope="row">' + ix++ + '</td>';
          baris += '<td>' + data[i]["data"][a]["nameitem"] + '</td>';
          baris += '<td>' + data[i]["data"][a]["sku"] + '</td>';
          baris += '<td>' + - +'</td>';
          baris += '<td>' + data[i]["data"][a]["hargaitem"] + '</td>';
          baris += '</tr>';
        }
        break;
      }
    }
    $('#xdetails').html(baris);
  }
</script>