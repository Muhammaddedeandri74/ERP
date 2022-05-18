<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="https://use.typekit.net/vke3pqz.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Link Font dari adobe -->
  <link rel="stylesheet" href="https://use.typekit.net/vke3pqz.css">
  <!-- Link Box Icon -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('assets/css/indexxxx.css') ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

  <title>S-ERP</title>

</head>

<style>
  * {
    font-family: proxima-nova, sans-serif !important;
  }

  .dropdown-submenu {
    position: relative;
  }

  .dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
  }

  .dropdown-menu li {
    position: relative;
  }

  .dropdown-menu .dropdown-submenu {
    display: none;
    position: absolute;
    left: 100%;
    top: -7px;
  }

  .dropdown-menu .dropdown-submenu-left {
    right: 100%;
    left: auto;
  }

  .dropdown-menu>li:hover>.dropdown-submenu {
    display: block;
  }

  .dropdown-item {
    width: max-content !important;
  }

  .dropdown-menu {
    width: max-content !important;
  }

  .header {
    background: #1143d8 0% 0% no-repeat padding-box;
  }

  .bc-active {
    color: white;
  }

  .content {
    background: #FFFFFF 0% 0% no-repeat padding-box;
    border: 1px solid #0000001E;
    border-radius: 12px;
    opacity: 1;
    min-height: 70vh;
    transform: translateY(-4.75rem);
    padding: 2rem;
  }

  .body {
    background: #F8FAFC 0% 0% no-repeat padding-box;
    opacity: 1;
  }

  .navbar-nav {
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  .nav-link {
    font-size: 20px;
  }

  .list-akses thead tr td {
    font-weight: bolder;
    min-width: 196px;
  }
</style>

<body class="body">
  <nav class="navbar navbar-expand-lg navbar-light header px-4 nav-link">
    <div class="container-fluid">
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img src="<?php echo base_url('assets/icon/logo_yubi.png') ?>" height="25" alt="MDB Logo" loading="lazy" />
      </a>
      <ul class="navbar-nav ms-lg-5">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            Dashboard
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item " href="#">
                <div class="row mt-2">
                  <div class="col-2">
                    <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                    <h6>Panel Info</h6>
                    <p>Panel Informasi Keseluruhan</p>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <div class="row mt-2">
                  <div class="col-2">
                    <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                    <h6>Master Menu</h6>
                    <p>Menu Master & Security</p>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            Order Management
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item " href="#">
                <div class="row mt-2">
                  <div class="col-2">
                    <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                    <h6>Quotation</h6>
                    <p>Penawaran Untuk Customer</p>
                  </div>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-submenu" style="border-radius: 10px;">
                <li>
                  <a class="dropdown-item m-2" href="<?php echo base_url('QuotationController/addquot') ?>">Register Quotation</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="<?php echo base_url('QuotationController/reportquot') ?>">Quotation Report</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="dropdown-item " href="#">
                <div class="row mt-2 w-100">
                  <div class="col-2">
                    <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                    <h6>Sales Order</h6>
                    <p>Buat Data Penjualan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                  </div>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-submenu" style="border-radius: 10px;">
                <li>
                  <a class="dropdown-item m-2" href="<?php echo base_url('OrderManagementController/addsalesorder') ?>">Register Order Confirmation</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="<?php echo base_url('OrderManagementController/orderreport') ?>">Order Confirmation Report</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            Purchase Management
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item " href="#">
                <div class="row mt-2">
                  <div class="col-2">
                    <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                    <h6>Purchase Order</h6>
                    <p>Menu Pembelian Barang</p>
                  </div>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-submenu mt-2" style="border-radius: 10px;">
                <li>
                  <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/AddPo') ?>">Register Purchase Order</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/PoStatus') ?>">Purchase Order Status</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="#">Purchase Order Report</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="dropdown-item " href="#">
                <div class="row mt-2">
                  <div class="col-2">
                    <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                    <h6>Purchase Invoice</h6>
                    <p>Menu Invoice Pembelian</p>
                  </div>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-submenu" style="border-radius: 10px;">
                <li>
                  <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/Purchaseinvoice') ?>">Register Purchase Invoice</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/RequestInvoice') ?>">Purchase Invoice Status</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="#">Purchase Invoice Report</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="dropdown-item " href="<?php echo base_url('OrderManagementController/addsalesorder') ?>">
                <div class="row mt-2">
                  <div class="col-2">
                    <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                    <h6>Purchase Adjustment</h6>
                    <p>Menu Adjustment Invoice</p>
                  </div>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-submenu" style="border-radius: 10px;">
                <li>
                  <a class="dropdown-item m-2" href="#">Register Purchase Adjustment</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="#">Register Advance In Purchase</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="#">Register Return Advance</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="#">Purchase Adjustment Report</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="#">Advance In Purchase Report</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="#">Return Advance Report</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            Inventory Management
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item " href="#">
                <div class="row mt-2">
                  <div class="col-2">
                    <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                    <h6>Request PO</h6>
                    <p>Membuat permintaan belanja</p>
                  </div>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-submenu mt-2" style="border-radius: 10px;">
                <li>
                  <a class="dropdown-item m-2" href="">Register Request PO</a>
                </li>
                <li>
                  <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/PoStatus') ?>">Register PO List</a>
                </li>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-item  w-100" href="#">
            <div class="row mt-2">
              <div class="col-2">
                <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
              </div>
              <div class="col-6 ms-3">
                <h6>Inventory In</6>
                  <p>Proses pemasukan barang</p>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-submenu mt-2" style="border-radius: 10px;">
            <li>
              <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/newinvin') ?>">Register Ingoing</a>
            </li>
            <li>
              <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/ingoingstatus') ?>">Ingoing Status</a>
            </li>
            <li>
              <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/ingoingstatus') ?>">Ingoing Report</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-item  w-100" href="#">
            <div class="row mt-2">
              <div class="col-2">
                <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
              </div>
              <div class="col-6 ms-3">
                <h6>Inventory Out</6>
                  <p>Proses pengeluaran barang</p>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-submenu mt-2" style="border-radius: 10px;">
            <li>
              <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/inventoryout') ?>">Register Outgoing</a>
            </li>
            <li>
              <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/outstatus') ?>">Outgoing Status</a>
            </li>
            <li>
              <a class="dropdown-item m-2" href="#">Outgoing List</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-item  w-100" href="#">
            <div class="row mt-2">
              <div class="col-2">
                <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
              </div>
              <div class="col-6 ms-3">
                <h6>Transaction Book</6>
                  <p>Data transaksi In/Out</p>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-submenu mt-2" style="border-radius: 10px;">
            <li>
              <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/InOutReport') ?>">IN/OUT Report</a>
            </li>
            <li>
              <a class="dropdown-item m-2" href="<?php echo base_url('InventoryController/Stockcard') ?>">Stock Card Report</a>
            </li>
            <li>
              <a class="dropdown-item m-2" href="#">Safety Stock Report</a>
            </li>
            <li>
              <a class="dropdown-item m-2" href="#">Expired Report</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-item  w-100" href="#">
            <div class="row mt-2">
              <div class="col-2">
                <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
              </div>
              <div class="col-6 ms-3">
                <h6>Inventory Closing</6>
                  <p>Proses Adjustment & Opname</p>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-submenu mt-2" style="border-radius: 10px;">
            <li>
              <a class="dropdown-item m-2" href="#">Inventory Closing</a>
            </li>
            <li>
              <a class="dropdown-item m-2" href="#">Register Stock Opname</a>
            </li>
            <li>
              <a class="dropdown-item m-2" href="#">Stock Opname Report</a>
            </li>
            <li>
              <a class="dropdown-item m-2" href="#">Stock Adjustment</a>
            </li>
          </ul>
        </li>
      </ul>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
          Sales Management
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item " href="#">
              <div class="row mt-2">
                <div class="col-2">
                  <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                </div>
                <div class="col-6 ms-3">
                  <h6>Invoice Sales B2B</h6>
                  <p>Menu Untuk Membuat Tagihan</p>
                </div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-submenu" style="border-radius: 10px;">
              <li>
                <a class="dropdown-item m-2" href="<?php echo base_url('QuotationController/addquot') ?>">Register Invoice Sales</a>
              </li>
              <li>
                <a class="dropdown-item m-2" href="<?php echo base_url('QuotationController/reportquot') ?>">Invoice Report</a>
              </li>
            </ul>
          </li>
          <li>
            <a class="dropdown-item " href="<?php echo base_url('OrderManagementController/addsalesorder') ?>">
              <div class="row mt-2">
                <div class="col-2">
                  <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                </div>
                <div class="col-6 ms-3">
                  <h6>Sales Adjustment</h6>
                  <p>Menu Adjustment Invoice</p>
                </div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-submenu" style="border-radius: 10px;">
              <li>
                <a class="dropdown-item m-2" href="#">Register Sales Adjustment</a>
              </li>
              <li>
                <a class="dropdown-item m-2" href="#">Advance From Customer</a>
              </li>
              <li>
                <a class="dropdown-item m-2" href="#">Register Return Advance</a>
              </li>
              <li>
                <a class="dropdown-item m-2" href="#">Sales Adjustment Report</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white dropstart" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
          Book Management
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item " href="#">
              <div class="row mt-2">
                <div class="col-2">
                  <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                </div>
                <div class="col-6 ms-3">
                  <h6>Daily Book Of Sales</h6>
                  <p>Laporan Penjualan Harian</p>
                </div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left" style="border-radius: 10px;">
              <li>
                <a class="dropdown-item m-2" href="<?php echo base_url('QuotationController/addquot') ?>">Sales Book Daily</a>
              </li>
              <li>
                <a class="dropdown-item m-2" href="<?php echo base_url('QuotationController/reportquot') ?>">Excel</a>
              </li>
            </ul>
          </li>
          <li>
            <a class="dropdown-item " href="<?php echo base_url('OrderManagementController/addsalesorder') ?>">
              <div class="row mt-2">
                <div class="col-2">
                  <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png') ?>" alt="">
                </div>
                <div class="col-6 ms-3">
                  <h6>Monthly Book Of Sales</h6>
                  <p>Laporan Penjualan Bulanan</p>
                </div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left" style="border-radius: 10px;">
              <li>
                <a class="dropdown-item m-2" href="#">Sales Book Monthly</a>
              </li>
              <li>
                <a class="dropdown-item m-2" href="#">Excel</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white dropdown-left" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
          User
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="transform: translateX(-5.1rem);">
          <li>
            <a class="dropdown-item" href="#">Profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="<?php echo base_url('AuthControler/logout') ?>">Logout</a>
          </li>
        </ul>
      </li>
    </div>
  </nav>