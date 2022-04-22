 
  <div class="sidebar">
      <ul>
        <?php if ($title == "dashboard"){ ?>
          <li class="main-menu active" onclick="dashboard()">
        <?php }else{ ?>
          <li class="main-menu" onclick="dashboard()">
        <?php } ?>  

          <div class="menu-icon">
            <i class="icon bx bxs-grid-alt"></i>
            <div class="tooltips">Dashboard</div>
          </div>
        </li>
         <?php if ($title == "sales"){ ?>
            <li class="main-menu active">
         <?php }else{ ?>
            <li class="main-menu">
          <?php } ?>  
          <div class="menu-icon">
            <i class="icon bx bxs-file"></i>
            <div class="tooltips">Sales Order</div>
          </div>
          <div class="path">
            <div class="submenu">
              <h3 class="menu-title">SALES ORDER</h3>
              <div class="menu-block">
                <h3 class="list-menu-title">SALES</h3>
                <ul>
                  <a href="<?php echo base_url('Employe') ?>">
                    <li>
                      <p>Terbaru</p>
                    </li>
                  </a>
                  <a href="<?php echo base_url('Employe/salesorder') ?>">
                    <li>
                      <p>Sales Order</p>
                    </li>
                  </a>
                   <a href="<?php echo base_url('Employe/pendinglist') ?>">
                    <li>
                      <p>Pending List</p>
                    </li>
                  </a>
                  <a href="<?php echo base_url('SalesinvoiceControler') ?>">
                    <li>
                      <p>Invoice</p>
                    </li>
                  </a>
                </ul>
              </div>
              <div class="menu-block">
                <h3 class="list-menu-title">QUOTATION</h3>
                <ul>
                  <a href="<?php echo base_url('Employe/addquotation') ?>">
                    <li>
                      <p>Buat Penawaran</p>
                    </li>
                  </a>
                  <a href="<?php echo base_url('Employe/quotationlist') ?>">
                    <li>
                      <p>List Quotation</p>
                    </li>
                  </a>
                </ul>
              </div>

              <div class="menu-block">
                <h3 class="list-menu-title">SALES MANAGEMENT</h3>
                <ul>
                  <a href="">
                    <li>
                      <p>Report</p>
                    </li>
                  </a>
                  <a href="<?php echo base_url('Employe/salesbook') ?>">
                    <li>
                      <p>Sales Book</p>
                    </li>
                  </a>
                </ul>
              </div>
            </div>
          </div>
        </li>

         <?php if ($title == "gudang"){ ?>
            <li class="main-menu active">
          <?php }else{ ?>
            <li class="main-menu">
          <?php } ?>  
          <div class="menu-icon">
            <i class="icon bx bxs-box"></i>
            <div class="tooltips">Gudang</div>
          </div>
          <div class="submenu">
            <h3 class="menu-title">WAREHOUSE</h3>
            <div class="menu-block">
              <h3 class="list-menu-title">MAIN MENU</h3>
              <ul>
                <a href="">
                  <li>
                    <p>Terbaru</p>
                  </li>
                </a>
                <a href="">
                  <li>
                    <p>Ingoing & Outgoing</p>
                  </li>
                </a>
              </ul>
            </div>
            <div class="menu-block">
              <h3 class="list-menu-title">STOCK</h3>
              <ul>
                <a href="">
                  <li>
                    <p>Stock Inventory</p>
                  </li>
                </a>
                <a href="">
                  <li>
                    <p>Purchase Request</p>
                  </li>
                </a>
              </ul>
            </div>

            <div class="menu-block">
              <h3 class="list-menu-title">Management</h3>
              <ul>
                <a href="">
                  <li>
                    <p>Report</p>
                  </li>
                </a>
              </ul>
            </div>
          </div>
        </li>

         <?php if ($title == "counter"){ ?>
             <li class="main-menu active">
          <?php }else{ ?>
            <li class="main-menu">
          <?php } ?>  
          <div class="menu-icon">
            <i class="icon bx bxs-box"></i>
            <div class="tooltips">Counter</div>
          </div>

          <div class="submenu">
            <h3 class="menu-title">Counter</h3>
            <div class="menu-block">
              <h3 class="list-menu-title">MAIN MENU</h3>
              <ul>
                <a href="<?php echo base_url('CounterController') ?>">
                  <li>
                    <p>Terbaru</p>
                  </li>
                </a>
                <a href="<?php echo base_url('CounterController/inout') ?>">
                  <li>
                    <p>Ingoing & Outgoing</p>
                  </li>
                </a>

                <a href="">
                  <li>
                    <p>Reports</p>
                  </li>
                </a>
              </ul>
            </div>
            <div class="menu-block">
              <h3 class="list-menu-title">STOCK</h3>
              <ul>
                <a href="<?php echo base_url('CounterController/stockinventory') ?>">
                  <li>
                    <p>Stock Inventory</p>
                  </li>
                </a>
              </ul>
            </div>

            <div class="menu-block">
              <h3 class="list-menu-title">PACKAGING</h3>
              <ul>
                <a href="<?php echo base_url('CounterController/deliveryorder') ?>">
                  <li>
                    <p>Delivery Order</p>
                  </li>
                </a>
              </ul>
            </div>
          </div>
        </li>

         <?php if ($title == "Purchasing"){ ?>
          <li class="main-menu active">
        <?php }else{ ?>
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
                <a href="">
                  <li>
                    <p>Terbaru</p>
                  </li>
                </a>
                <a href="<?php echo base_url('PrQuo/pr') ?>">
                  <li>
                    <p>Purchase Request</p>
                  </li>
                </a>
                <a href="<?php echo base_url('PrQuo/po') ?>">
                  <li>
                    <p>Purchase Order</p>
                  </li>
                </a>
                <a href="<?php echo base_url('InOut/invin') ?>">
                  <li>
                    <p>In Purchase</p>
                  </li>
                </a>
              </ul>
            </div>
            <div class="menu-block">
              <h3 class="list-menu-title">MANAGEMENT</h3>
              <ul>
                <a href="">
                  <li>
                    <p>Report</p>
                  </li>
                </a>
              </ul>
            </div>
          </div>
        </li>
        <li class="main-menu">
          <a href="<?php echo base_url('AuthControler/mainpage') ?>">
             <div class="menu-icon">
                <i class="icon bx bx-command"></i>
                <div class="tooltips">Manage</div>
            </div>

          </a>
         
         
        </li>
      </ul>
    </div>
