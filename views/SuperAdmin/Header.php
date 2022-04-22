<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="https://use.typekit.net/vke3pqz.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"  rel="stylesheet"/>
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet"/>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
></script>

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
    .dropdown-menu > li:hover > .dropdown-submenu {
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
    .nav-link{
		font-size:20px;
	}
  </style>
  <body class="body" >



<nav class="navbar navbar-expand-lg navbar-light header px-4 nav-link">
  <div class="container-fluid">
       <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="<?php echo base_url('assets/icon/logo_yubi.png')?>"
          height="25"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
     
    <ul class="navbar-nav ms-lg-5 ">
     
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button"
          data-mdb-toggle="dropdown" aria-expanded="false">
        Dashboard
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="#">Action</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another action</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              Submenu &raquo;
            </a>
            <ul class="dropdown-menu dropdown-submenu">
              <li>
                <a class="dropdown-item" href="#">Submenu item 1</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 2</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 3 &raquo; </a>
                <ul class="dropdown-menu dropdown-submenu">
                  <li>
                    <a class="dropdown-item" href="#">Multi level 1</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Multi level 2</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 4</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 5</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button"
          data-mdb-toggle="dropdown" aria-expanded="false">
       Order Management
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <li>
            <a class="dropdown-item " href="#">
              <div class="row mt-2">
                  <div class="col-2">
                      <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png')?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                      <h6>Buat Quotation</h6>
                      <p>Membuat penawaran produk</p>
                  </div>
              </div>
            </a>
          </li>
        </ul>
      </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button"
          data-mdb-toggle="dropdown" aria-expanded="false">
            Purchase Management
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="#">Action</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another action</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              Submenu &raquo;
            </a>
            <ul class="dropdown-menu dropdown-submenu">
              <li>
                <a class="dropdown-item" href="#">Submenu item 1</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 2</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 3 &raquo; </a>
                <ul class="dropdown-menu dropdown-submenu">
                  <li>
                    <a class="dropdown-item" href="#">Multi level 1</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Multi level 2</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 4</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 5</a>
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
                      <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png')?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                      <h6>Request PO</h6>
                      <p>Membuat permintaan belanja</p>
                  </div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-submenu mt-2">
              <li>
                <a class="dropdown-item" href="#">Register Request PO</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Register PO List</a>
              </li>
              </li>
            </ul>
          </li>
          <li>
            <a class="dropdown-item  w-100" href="#">
              <div class="row mt-2">
                  <div class="col-2">
                      <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png')?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                      <h6>Inventory In</6>
                      <p>Proses pemasukan barang</p>
                  </div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-submenu mt-2">
              <li>
                <a class="dropdown-item" href="<?php echo base_url('InventoryController/addinventoryin')?>">Register Ingoing</a>
              </li>
              <li>
                <a class="dropdown-item" href="<?php echo base_url('InventoryController/ingoingstatus')?>">Ingoing Status</a>
              </li>
              </li>
            </ul>
          </li>
          <li>
            <a class="dropdown-item  w-100" href="#">
              <div class="row mt-2">
                  <div class="col-2">
                      <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png')?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                      <h6>Inventory Out</6>
                      <p>Proses pengeluaran barang</p>
                  </div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-submenu mt-2">
              <li>
                <a class="dropdown-item" href="#">Register Outgoing</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Outgoing List</a>
              </li>
              </li>
            </ul>
          </li>

          <li>
            <a class="dropdown-item  w-100" href="#">
              <div class="row mt-2">
                  <div class="col-2">
                      <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png')?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                      <h6>Transaction Book</6>
                      <p>Data transaksi In/Out</p>
                  </div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-submenu mt-2">
              <li>
                <a class="dropdown-item" href="#">In / Out Report</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Safety Stock Report</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Expired Report</a>
              </li>
              </li>
            </ul>
         
          </li>

          <li>
            <a class="dropdown-item  w-100" href="#">
              <div class="row mt-2">
                  <div class="col-2">
                      <img class="h-75" src="<?php echo base_url('assets/icon/menu-item.png')?>" alt="">
                  </div>
                  <div class="col-6 ms-3">
                      <h6>Inventory Closing</6>
                      <p>Proses Adjusment & Opname</p>
                  </div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-submenu mt-2">
              <li>
                <a class="dropdown-item" href="#">Inventory Closing</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Register Stock Opname</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Stock Opname Report</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Stock Adjusment</a>
              </li>
              </li>
            </ul>
         
          </li>
          
        </ul>

        

        
      </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button"
          data-mdb-toggle="dropdown" aria-expanded="false">
        Sales Management
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="#">Action</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another action</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              Submenu &raquo;
            </a>
            <ul class="dropdown-menu dropdown-submenu">
              <li>
                <a class="dropdown-item" href="#">Submenu item 1</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 2</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 3 &raquo; </a>
                <ul class="dropdown-menu dropdown-submenu">
                  <li>
                    <a class="dropdown-item" href="#">Multi level 1</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Multi level 2</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 4</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 5</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button"
          data-mdb-toggle="dropdown" aria-expanded="false">
        Book Management
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="#">Action</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another action</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              Submenu &raquo;
            </a>
            <ul class="dropdown-menu dropdown-submenu">
              <li>
                <a class="dropdown-item" href="#">Submenu item 1</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 2</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 3 &raquo; </a>
                <ul class="dropdown-menu dropdown-submenu">
                  <li>
                    <a class="dropdown-item" href="#">Multi level 1</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Multi level 2</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 4</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Submenu item 5</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button"
          data-mdb-toggle="dropdown" aria-expanded="false">
        User
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="#">Profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="<?php echo base_url('AuthControler/logout')?>">Logout</a>
          </li>
        </ul>
      </li>

    </ul>
  </div>
</nav>
</body>
</html>
