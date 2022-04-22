
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('AuthControler/mainpage')?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ERP PROJECT</div>
            </a>

            <!-- Nav Item - Dashboard -->
           
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Controller
            </div>

             <li class="nav-item">
                <a class="nav-link" href="<?= base_url('AuthControler/mainpage')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Main Page</span></a>
            </li>


               <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#system"
                    aria-expanded="true" aria-controls="collapseTwo">
                   <i class="fas fa-users-cog"></i>
                    <span>Master Data</span>
                </a>
                <div id="system" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                          <a class="collapse-item" href="<?php echo base_url('MasterDataControler/currency') ?>">Currency</a>
                           <a class="collapse-item" href="<?php echo base_url('MasterDataControler/customer') ?>">Customer</a>
                            <a class="collapse-item" href="<?php echo base_url('MasterDataControler/item') ?>">Item</a>
                        <a class="collapse-item" href="<?php echo base_url('MasterDataControler/supplier') ?>">Supplier</a>
                         <a class="collapse-item" href="<?php echo base_url('MasterDataControler/user') ?>">User</a>
                        <a class="collapse-item" href="<?php echo base_url('MasterDataControler/warehouse') ?>">Warehouse</a>
                      
                      
                       
                      
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#parameter"
                    aria-expanded="true" aria-controls="collapseTwo">
                   <i class="fas fa-sliders-h"></i>
                    <span>Offering</span>
                </a>
                <div id="parameter" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                        
                        <a class="collapse-item" href="<?php echo base_url('RequestControler/quotation') ?>">Quotation</a>
                        <a class="collapse-item" href="<?php echo base_url('RequestControler/import') ?>">Import From Excel</a>
                        <!-- <a class="collapse-item" href="">Line & Style Barcode</a> -->
                    </div>
                </div>
            </li>


             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#parameters"
                    aria-expanded="true" aria-controls="collapseTwo">
                   <i class="fas fa-calendar-alt"></i>
                    <span>Order</span>
                </a>
                <div id="parameters" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                        
                        <a class="collapse-item" href="<?php echo base_url('OrderControler/salesorder') ?>">Sales Order</a>
                        <a class="collapse-item" href="<?php echo base_url('OrderControler/purchaseorder') ?>">Purchase Order</a>
                        <a class="collapse-item" href="<?php echo base_url('OrderControler/listsalesorder') ?>">List Sales Order</a>
                        <a class="collapse-item" href="<?php echo base_url('OrderControler/listpurchaseorder') ?>">List Purchase Order</a>
                        <!-- <a class="collapse-item" href="">Line & Style Barcode</a> -->
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#parameterx"
                    aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-cubes"></i>
                    <span>Stock</span>
                </a>
                <div id="parameterx" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                        
                        <a class="collapse-item" href="<?php echo base_url('StockControler/inventoryin') ?>">Inventory In</a>
                        <a class="collapse-item" href="<?php echo base_url('StockControler/inventoryout') ?>">Inventory Out</a>
                        <a class="collapse-item" href="<?php echo base_url('StockControler/requestitem') ?>">Request Item</a>
                        <a class="collapse-item" href="<?php echo base_url('StockControler/movewarehouse') ?>">Move Warehouse</a>
                        <!-- <a class="collapse-item" href="">Line & Style Barcode</a> -->
                    </div>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#parameterxy"
                    aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-chart-bar"></i>
                    <span>Reporting</span>
                </a>
                <div id="parameterxy" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">                        
                        <a class="collapse-item" href="<?php echo base_url('ReportingControler/dailysales') ?>">Daily Sales</a>
                        <a class="collapse-item" href="<?php echo base_url('ReportingControler/inventoryout') ?>">Inventory Basic</a>
                        <a class="collapse-item" href="<?php echo base_url('ReportingControler/dailypurchase') ?>">Daily Purchase</a>
                        <a class="collapse-item" href="<?php echo base_url('ReportingControler/expireddatedaily') ?>">Expired Date Daily</a>
                        <a class="collapse-item" href="<?php echo base_url('ReportingControler/endingstock') ?>">Ending Stock</a>
                        <a class="collapse-item" href="<?php echo base_url('ReportingControler/mstockadjustment') ?>">Stock Adjusment</a>
                        <!-- <a class="collapse-item" href="">Line & Style Barcode</a> -->
                    </div>
                </div>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
         <!--    <li class="nav-item">
                <a class="nav-link" href="<?= base_url('PaymentControler')?>">
                    <i class="fas fa-credit-card"></i>
                    <span>Payment</span></a>
            </li> -->

           <!--   <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwos"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Reporting</span>
                </a>
                <div id="collapseTwos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url("ReportingControler/inventory") ?>">Inventory Report</a>
                       
                       
                    </div>
                </div>
            </li> -->


            
           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar