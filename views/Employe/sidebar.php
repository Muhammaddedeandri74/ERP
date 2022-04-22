<style>
  .menu-block ul a li p {
    position: relative;
  }
</style>
<div class="sidebar">
  <ul>
    <?php if ($title == "dashboard") { ?>
      <li class="main-menu active" onclick="dashboard()">
      <?php } else { ?>
      <li class="main-menu" onclick="dashboard()">
      <?php } ?>
      <div class="menu-icon">
        <i class="icon bx bxs-grid-alt"></i>
        <div class="tooltips">Dashboard</div>
      </div>
      </li>
      <?php if ($title == "sales") { ?>
        <li class="main-menu active">
        <?php } else { ?>
        <li class="main-menu">
        <?php } ?>
        <div class="menu-icon">
          <i class="icon bx bxs-file"></i>
          <div class="tooltips">Sales Order</div>
        </div>
        <div class="submenu">
          <h3 class="menu-title">SALES ORDER</h3>
          <div class="menu-block">
            <h3 class="list-menu-title">SALES</h3>
            <ul>
              <?php date_default_timezone_set("Asia/Jakarta"); ?>
              <a id="terbaru" class="disabled" href="<?php echo base_url('Employe?start=') . date('Y-m-d') . '&finish=' . date('Y-m-d') . '' ?>">
                <li>
                  <p>Terbaru</p>
                </li>
              </a>
              <a id="salesorder" class="disabled" href="<?php echo base_url('Employe/salesorder') ?>">
                <li>
                  <p>Sales Order</p>
                </li>
              </a>
              <a id="pendinglist" class="disabled" href="<?php echo base_url('Employe/pendinglist') ?>">
                <li>
                  <p>Pending List</p>
                </li>
              </a>
              <a id="invoice" class="disabled" href="<?php echo base_url('SalesinvoiceControler') ?>">
                <li>
                  <p>Invoice</p>
                </li>
              </a>
            </ul>
          </div>
          <div class="menu-block">
            <h3 class="list-menu-title">QUOTATION</h3>
            <ul>
              <a id="buatpenawaran" class="disabled" href="<?php echo base_url('Employe/addquotation') ?>">
                <li>
                  <p>Buat Penawaran</p>
                </li>
              </a>
              <a id="listquotation" class="disabled" href="<?php echo base_url('Employe/quotationlist') ?>">
                <li>
                  <p>List Quotation</p>
                </li>
              </a>
            </ul>
          </div>
          <div class="menu-block">
            <h3 class="list-menu-title">SALES MANAGEMENT</h3>
            <ul>
              <a id="salesbook" class="disabled" href="<?php echo base_url('Employe/salesbook') ?>">
                <li>
                  <p>Sales Book</p>
                </li>
              </a>
            </ul>
          </div>
        </div>
        </li>
        <?php if ($title == "gudang") { ?>
          <li class="main-menu active">
          <?php } else { ?>
          <li class="main-menu">
          <?php } ?>
          <div class="menu-icon">
            <i class="icon bx bxs-box"></i>
            <div class="tooltips">Gudang</div>
          </div>
          <div class="submenu">
            <h3 class="menu-title">Gudang Utama</h3>
            <div class="menu-block">
              <h3 class="list-menu-title">MAIN MENU</h3>
              <ul>
                <!-- <a id="terbarugudang" class="disabled" href="<?php echo base_url('InOut') ?>">
                  <li>
                    <p>Terbaru</p>
                  </li>
                </a> -->
                <a id="requestgudang" class="disabled" href="<?php echo base_url('PrQuo/pr') ?>">
                  <li>
                    <p>Request</p>
                  </li>
                </a>
                <a id="ingoingoutgoinggudang" class="disabled" href="<?php echo base_url('InOut/invin') ?>">
                  <li>
                    <p>Ingoing & Outgoing</p>
                  </li>
                </a>
                <!-- <a href="<?php echo base_url('InOut/invinret') ?>">
                  <li>
                    <p>Inventory Out</p>
                  </li>
                </a> -->
                <a id="pindahgudanggudang" class="disabled" href="<?php echo base_url('InOut/movewh') ?>">
                  <li>
                    <p>Stock Out</p>
                  </li>
                </a>
                <a id="paketbundleitemgudang" class="disabled" href="<?php echo base_url('InOut/paket') ?>">
                  <li>
                    <p>Paket Bundle Item</p>
                  </li>
                </a>
                <a id=reportgudang class="disabled" href="<?php echo base_url('InOut/reportingoing') ?>">
                  <li>
                    <p>Report</p>
                  </li>
                </a>
                <a id="ceksngudang" class="disabled" href="<?php echo base_url('CounterController/snwarehouse?start=0&finish=2&page=1') ?>">
                  <li>
                    <p>Cek SN</p>
                  </li>
                </a>
                <!-- <a href="<?php echo base_url('InOut/pakets') ?>">
                  <li>
                    <p>Split Bundle Item</p>
                  </li>
                </a> -->
              </ul>
            </div>
            <div class="menu-block">
              <h3 class="list-menu-title">STOCK</h3>
              <ul>
                <!--  <a id="inventoryinoutbook" href="<?php echo base_url('reporting/stockcardin') ?>">
                  <li>
                    <p>Inventory In & Out Book</p>
                  </li>
                </a> -->
                <!-- <a href="<?php echo base_url('reporting/stockcardout') ?>">
                  <li>
                    <p>Inventory Out Book</p>
                  </li>
                </a> -->
                <a id="iostatusgudang" class="disabled" href="<?php echo base_url('reporting/stockcard2') ?>">
                  <li>
                    <p>IO Status</p>
                  </li>
                </a>
                <a id="stockinventorygudang" class="disabled" href="<?php echo base_url('reporting/stockcard') ?>">
                  <li>
                    <p>Stock Inventory</p>
                  </li>
                </a>
                <!-- <a id="balancestock" class="disabled" href="<?php echo base_url('reporting/stockbook') ?>">
                  <li>
                    <p>Balance Stock</p>
                  </li>
                </a> -->
              </ul>
            </div>
            <div class="menu-block">
              <h3 class="list-menu-title">Management</h3>
              <ul>
                <a id="purchaserequestbook" class="disabled" href="<?php echo base_url('reporting/bookpr') ?>">
                  <li>
                    <p>Purchase Request Book</p>
                  </li>
                </a>
              </ul>
            </div>
          </div>
          </li>
          <?php if ($title == "counter") { ?>
            <li class="main-menu active">
            <?php } else { ?>
            <li class="main-menu">
            <?php } ?>
            <div class="menu-icon position-relative">
              <?php $notif   = $this->db->get_where('tb_salesorder', ['notif' => 0, 'statusorder' => 'Waiting'])->result_array();
              $notif_count = count($notif);
              ?>

              <?php $notif           = $this->db->get_where('tb_salesorder', ['notif' => 0, 'statusorder' => 'Waiting'])->result_array();
              $notifwaiting     = count($notif);
              ?>
              <?php $notif           = $this->db->get_where('tb_salesorder', ['notif' => 1, 'statusorder' => 'Process'])->result_array();
              $notifprocess     = count($notif);
              ?>
              <?php
              $notifs         = $this->db->get_where('tb_salesorder', ['notif' => 2, 'statusorder' => 'Finish'])->result_array();
              $notiffinish  = count($notifs);
              ?>

              <i class="icon bx bxs-package" style="display: block;"></i>
              <?php if ($notifwaiting == 0) : ?>
                <span class="badge badge-danger navbar-badge"></span>
              <?php else : ?>
                <span class="badge badge-danger navbar-badge">Baru</span>
              <?php endif ?>

              <?php if ($notifprocess == 0) : ?>
                <span class="badge badge-danger navbar-badge"></span>
              <?php else : ?>
                <span class="badge badge-danger navbar-badge">Baru</span>
              <?php endif ?>

              <?php if ($notiffinish == 0) : ?>
                <span class="badge badge-danger navbar-badge"></span>
              <?php else : ?>
                <span class="badge badge-danger navbar-badge">Baru</span>
              <?php endif ?>

              <div class="tooltips">Counter</div>
            </div>
            <div class="submenu">
              <h3 class="menu-title">Counter</h3>
              <div class="menu-block">
                <h3 class="list-menu-title">MAIN MENU</h3>
                <ul>
                  <!-- <a id="terbarucounter" class="disabled"  href="<?php echo base_url('CounterController') ?>">
                    <li>
                      <p>Terbaru</p>
                    </li>
                  </a> -->
                  <?php
                  $notif           = $this->db->get_where('tb_salesorder', ['notif' => 0, 'statusorder' => 'Waiting'])->result_array();
                  $count_notif     = count($notif);
                  ?>
                  <a id="ingoingoutgoingcounter" class="disabled " href="<?php echo base_url('CounterController/inout') ?>">
                    <li>
                      <?php if ($count_notif == 0) : ?>
                        <p class="position-relative">Ingoing & Outgoing<span class="badge badge-danger navbar-badge"></span></p>
                      <?php else : ?>
                        <p class="position-relative">Ingoing & Outgoing<span class="badge badge-danger navbar-badge"><?= $notif_count; ?></span></p>
                      <?php endif ?>
                    </li>
                  </a>
                  <a id="reportscounter" class="disabled" href="<?php echo base_url('CounterController/report') ?>">
                    <li>
                      <p>Reports</p>
                    </li>
                  </a>
                  <a id="ceksncounter" class="disabled" href="<?php echo base_url('CounterController/sncounter?start=0&finish=2&page=1') ?>">
                    <li>
                      <p>Cek SN</p>
                    </li>
                  </a>
                </ul>
              </div>
              <div class="menu-block">
                <h3 class="list-menu-title">STOCK</h3>
                <ul>
                  <a id="stockinventorycounter" class="disabled" href="<?php echo base_url('CounterController/stockinventory') ?>">
                    <li>
                      <p>Stock Inventory</p>
                    </li>
                  </a>
                  <a id="iostatuscounter" class="disabled" href="<?php echo base_url('reporting/stockcard3') ?>">
                    <li>
                      <p>IO Status</p>
                    </li>
                  </a>
                </ul>
              </div>
              <div class="menu-block">
                <?php
                $notif         = $this->db->get_where('tb_salesorder', ['notif' => 1, 'statusorder' => 'Process'])->result_array();
                $countdelivery = count($notif);
                ?>
                <?php $notif  = $this->db->get_where('tb_salesorder', ['notif' => 2, 'statusorder' => 'Finish'])->result_array();
                $notifsend = count($notif);
                ?>
                <!-- ============================Notif Disabled====================== -->
                <?php
                $notifx        = $this->db->get_where('tb_salesorder', ['notif' => 1, 'statusorder' => 'Process'])->result_array();
                $notifdisable  = count($notifx);
                ?>
                <?php
                $notifs           = $this->db->get_where('tb_salesorder', ['notif' => 2, 'statusorder' => 'Finish'])->result_array();
                $notifdisabled    = count($notifs);
                ?>
                <h3 class="list-menu-title">PACKAGING</h3>
                <ul>
                  <a id="deliveryordercounter" class="disabled" href="<?php echo base_url('CounterController/deliveryorder') ?>">
                    <li>
                      <?php if ($notifdisable == 0) : ?>
                        <p>Delivery Order Process<span class="badge badge-danger navbar-badge"></span></p>
                      <?php else : ?>
                        <p>Delivery Order Process<span class="badge badge-danger navbar-badge"><?= $countdelivery ?></span></p>
                      <?php endif ?>
                    </li>
                  </a>
                  <a id="deliveryordercounter" class="disabled" href="<?php echo base_url('CounterController/terkirim') ?>">
                    <li>
                      <?php if ($notifdisabled == 0) : ?>
                        <p>Delivery Order Terkirim<span class="badge badge-danger navbar-badge"></span></p>
                      <?php else : ?>
                        <p>Delivery Order Terkirim<span class="badge badge-danger navbar-badge"><?= $notifsend ?></span></p>
                      <?php endif ?>
                    </li>
                  </a>
                </ul>
              </div>
            </div>
            </li>
            <?php if ($title == "Purchasing") { ?>
              <li class="main-menu active">
              <?php } else { ?>
              <li class="main-menu">
              <?php } ?>
              <div class="menu-icon">
                <i class="icon bx bxs-shopping-bags"></i>
                <div class="tooltips">Purchasing</div>
              </div>
              <div class="submenu">
                <h3 class="menu-title">PURCHASING</h3>
                <div class="menu-block">
                  <h3 class="list-menu-title">MAIN MENU</h3>
                  <ul>
                    <a id="terbaru" class="disabled" href="<?php echo base_url('PrQuo') ?>">
                      <li>
                        <p>Terbaru</p>
                      </li>
                    </a>
                    <a id="purchaseorder" class="disabled" href="<?php echo base_url('PrQuo/po') ?>">
                      <li>
                        <p>Purchase Order</p>
                      </li>
                    </a>
                    <a id="reportpurchase" class="disabled" href="<?php echo base_url('PrQuo/reportpr') ?>">
                      <li>
                        <p>Report</p>
                      </li>
                    </a>
                  </ul>
                </div>
                <!-- <div class="menu-block">
                  <h3 class="list-menu-title">MANAGEMENT</h3>
                  <ul>
                    <a id="purchaseorderbook" class="disabled" href="<?php echo base_url('reporting/bookpo') ?>">
                      <li>
                        <p>Purchase Order Book</p>
                      </li>
                    </a>
                  </ul>
                </div> -->
              </div>
              </li>
              <!-- <li class="main-menu">
                <a id="manage" class="disabled" href="<?php echo base_url('AuthControler/mainpage') ?>">
                  <div class="menu-icon">
                    <i class="icon bx bxs-user"></i>
                    <div class="tooltips">Profile</div>
                  </div>
                </a>
              </li> -->
              <?php
              $f = $this->session->userdata("data");
              ?>
              <?php
              // echo "<script> console.log(" + print_r($f["data"]) + ")</script>";
              foreach ($f["data"] as $key) {

                if ($key["menu"] == "Admin") : ?>

                  <li class="main-menu">
                    <a id="manage" class="disabled" href="<?php echo base_url('AuthControler/mainpage') ?>">
                      <div class="menu-icon">
                        <i class="icon bx bx-command"></i>
                        <div class="tooltips">Manage</div>
                      </div>
                    </a>
                  </li>
              <?php endif;
              } ?>

              <!-- ===================================================CODING NEW================================== -->
              <li class="main-menu">
                <a id="manage" class="disabled" href="<?php echo base_url('AuthControler/profiluser') ?>">
                  <div class="menu-icon">
                    <i class="icon bx bxs-user"></i>
                    <div class="tooltips">Profile</div>
                  </div>
                </a>
              </li>
              <!-- ===================================================CODING END================================== -->


              <li class="main-menu">
                <a id="logout" class="disabled" href="<?php echo base_url('AuthControler/logout') ?>">
                  <div class="menu-icon">
                    <i class="icon bx bx-log-out"></i>
                    <div class="tooltips">Logout</div>
                  </div>
                </a>
              </li>

  </ul>
</div>