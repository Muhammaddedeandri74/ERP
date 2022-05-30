<div class="header px-4 pt-2" style="height: 196px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
            <li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
        </ol>
        <h3 class="text-white">Akses Level</h3>
    </nav>
</div>
<div class="content bg-white  mx-4">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->session->flashdata('message'); ?>
            <?php $this->session->set_flashdata('message', ''); ?>
        </div>
        <form action="<?php echo base_url('MasterDataControler/addrole') ?>" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-3">
                    <label for="" class="form-label">Role Baru</label>
                    <input type="text" name="namerole" class="form-control" placeholder="Tambah Role Baru" autocomplete="off">
                </div>
                <div class="col-3">
                    <p></p>
                    <button type="submit" class="btn btn-outline-primary mt-3">Tambah</button>
                </div>
            </div>
            <div class="row mb-3" style="overflow-x: auto;">
                <div class="col">
                    <table class="table table-bordered list-akses">
                        <thead class="text-center">
                            <tr class="font-weight-bold">
                                <td>Nama Role</td>
                                <td>Informasi Pengguna</td>
                                <td>Informasi Produk</td>
                                <td>Informasi Gudang</td>
                                <td>Informasi Customer</td>
                                <td>Informasi Perusahaan</td>
                                <td>Quotation</td>
                                <td>Salesorder</td>
                                <td>Register Purchasing</td>
                                <td>Purchasing Invoice</td>
                                <td>Purchasing Book</td>
                                <td>Request Po</td>
                                <td>Inventory In</td>
                                <td>Inventory Out</td>
                                <td>Transaction Book</td>
                                <td>Inventory Closing</td>
                                <td>Sales Invoice</td>
                                <td>Sales Adjusment</td>
                                <td>Daily Book Of Sales</td>
                                <td>Month Book Of Sales</td>
                                <td>Action</td>
                        </thead>
                        <tbody class="text-center">
                            <?php if ($data != "Not Found") : ?>
                                <?php foreach ($data as $key) : ?>
                                    <tr>
                                        <td><?php echo $key["namerole"] ?></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="InformasiPengguna" value="Informasi Pengguna"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="InformasiProduk" value="Informasi Produk"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="InformasiGudang" value="Informasi Gudang"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="InformasiCustomer" value="Informasi Gudang"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="InformasiPerusahaan" value="Informasi Perusahaan"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="Quotation" value="Quotation"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="Salesorder" value="Salesorder"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="RegisterPurchasing" value="Register Purchasing"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="PurchasingInvoice" value="Purchasing Invoice"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="PurchasingBook" value="Purchasing Book"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="RequestPo" value="Request Po"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="InventoryIn" value="Inventory In"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="InventoryOut" value="Inventory Out"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="TransactionBook" value="Transaction Book"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="InventoryClosing" value="Inventory Closing"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="SalesInvoice" value="Sales Invoice"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="SalesAdjusment" value="Sales Adjusment"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="DailyBookOfSales" value="Daily Book Of Sales"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" id="MonthBookOfSales" value="Month Book Of Sales"></td>
                                        <td>
                                            <a href="" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-end">
                <a href="" class="btn btn-primary px-5">SIMPAN PERUBAHAN</a>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function logout() {
        window.location.href = "<?php echo base_url('AuthControler/logout') ?>";
    }

    function move() {
        window.location.href = "<?php echo base_url('AuthControler/employe') ?>";
    }
</script>