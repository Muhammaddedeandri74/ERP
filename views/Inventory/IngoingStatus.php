<div class="header px-4 pt-2" style="height: 196px;">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0">
      <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Inventory Management </a></li>
      <li class="breadcrumb-item m-0 bc-active" aria-current="page">Inventory In</li>
    </ol>
    <h3 class="text-white">Ingoing Status</h3>
  </nav>
</div>
<div class="content bg-white  mx-4">
  <div class="container-fluid">
    <div class="row">
      <?php echo $this->session->flashdata('message'); ?>
      <?php $this->session->set_flashdata('message', ''); ?>
    </div>
    <form action="<?php echo base_url('InventoryController/ingoingstatus') ?>" method="POST">
      <div class="row mb-4">
        <div class="col-8">
          <label for="" class="form-label fs-3 mb-3">Filter Status</label>
          <div class="row">
            <div class="col-6">
              <div class="row mb-3">
                <div class="col-5">
                  <label for="" class="form-label">Gudang Penerima</label>
                  <select name="namewh" class="form-select" aria-label="Default select example">
                    <option value="">Pilih</option>
                    <?php if ($data1 != "Not Found") : ?>
                      <?php foreach ($data1 as $key) : ?>
                        <option value="<?php echo $key["namewarehouse"] ?>"><?php echo $key["namewarehouse"] ?></option>
                      <?php endforeach ?>
                    <?php endif ?>
                  </select>
                </div>
                <div class="col-5">
                  <label for="" class="form-label">Tipe Ingoing</label>
                  <select name="tipein" class="form-select">
                    <option value="">Pilih</option>
                    <option value="supplier">Supplier</option>
                    <option value="return">Return</option>
                    <option value="move Warehouse">Move Warehouse</option>
                  </select>
                </div>
                <div class="col-2"></div>
              </div>
              <div class="row mb-3">
                <div class="col-10">
                  <label for="" class="form-label">Supplier</label>
                  <select name="namesupp" id="namesupp" class="form-select">
                    <option value="">Pilih</option>
                    <?php if ($data2 != "Not Found") : ?>
                      <?php foreach ($data2 as $key) : ?>
                        <option value="<?php echo $key["namecomm"] ?>"><?php echo $key["namecomm"] ?></option>
                      <?php endforeach ?>
                    <?php endif ?>
                  </select>
                </div>
                <div class="col-2"></div>
              </div>
              <div class="row">
                <div class="col-5">
                  <label for="" class="form-label">Mulai Dari</label>
                  <input type="date" name="date1" id="date1" value="<?= set_value('date1') ?>" class="form-control" style="width:100%;" placeholder="Pilih Tanggal">
                </div>
                <div class="col-5">
                  <label for="" class="form-label">Sampai Dengan</label>
                  <input type="date" name="date2" id="date1" value="<?= set_value('date1') ?>" class="form-control" style="width:100%;" placeholder="Pilih Tanggal">
                </div>
                <div class="col-2"></div>
              </div>
            </div>
            <div class="col-6">
              <div class="row mb-3">
                <div class="col-10">
                  <label for="" class="form-label">Item</label>
                  <input type="text" name="nameitem" class="form-control" placeholder="Pilih Item yang ingin dicari" id="">
                </div>
                <div class="col-2"></div>
              </div>
              <div class="row mb-3">
                <div class="col-10">
                  <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                      <a href="<?php echo base_url('InventoryController/ingoingstatus') ?>" class="btn" style="margin-left: 10px;">Reset</a>
                      <button type="submit" class="btn btn-primary" style="margin-left: 11px;">Pencarian</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <label for="" class="form-label fs-3 mb-3">Cetak & Download</label>
          <div class="me-3 mb-3">
            <p></p>
            <button class="btn btn-light mt-3"><i class='bx bxs-download'>Download</i></button>
            <button class="btn btn-light"><i class='bx bx-printer'>Cetak</i></button>
          </div>
        </div>
      </div>
      <div class="row">
        <label for="" class="form-label fs-4 mb-3">Item/Produk</label>
        <table class="table table-bordered table-striped list-akses" id="table-user">
          <thead class="border-0">
            <tr>
              <td style="background:#1143d8;color:white;min-width: auto;">No</td>
              <td style="background:#1143d8;color:white;min-width: auto;">No. Transaksi</td>
              <td style="background:#1143d8;color:white;min-width: auto;">No. Purchase Order</td>
              <td style="background:#1143d8;color:white;min-width: auto;">Supplier</td>
              <td style="background:#1143d8;color:white;min-width: auto;">Nama Item</td>
              <td style="background:#1143d8;color:white;min-width: auto;">SKU</td>
              <td style="background:#1143d8;color:white;min-width: auto;">Gudang Penerima</td>
              <td style="background:#1143d8;color:white;min-width: auto;">Tangal InventoryIn</td>
              <td style="background:#1143d8;color:white;min-width: auto;">Tipe Ingoing</td>
              <td style="background:#1143d8;color:white;min-width: auto;">Tipe Item</td>
              <td style="background:#1143d8;color:white;min-width: auto;">QtyPo</td>
              <td style="background:#1143d8;color:white;min-width: auto;">QtyIn</td>
              <td style="background:#1143d8;color:white;min-width: auto;">Harga</td>
              <td style="background:#1143d8;color:white;min-width: auto;">Deskripsi</td>
            </tr>
          </thead>
          <tbody>
            <?php if ($data != "Not Found") : ?>
              <?php $no = 1; ?>
              <?php foreach ($data as $key) : ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $key["codein"] ?></td>
                  <td><?php echo $key["codepo"] ?></td>
                  <td><?php echo $key["namesupp"] ?></td>
                  <td><?php echo $key["nameitem"] ?></td>
                  <td><?php echo $key["sku"] ?></td>
                  <td><?php echo $key["namewarehouse"] ?></td>
                  <td><?php echo $key["datein"] ?></td>
                  <td><?php echo $key["typein"] ?></td>
                  <td><?php echo $key["itemgroup"] ?></td>
                  <td><?php echo $key["qtypodet"] ?></td>
                  <td><?php echo $key["qtyindet"] ?></td>
                  <td><?php echo number_format($key['price'], 0, '.', ',') ?></td>
                  <td><?php echo $key["deskripsi"] ?></td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </form>
  </div>
</div>

<script>
  $(function() {
    $("#table-user").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>