    <!-- Sidebar -->
    <ul class="navbar-nav left-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>index.php/home_controller/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/home_controller/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php 

        $show_customer = true;
        $show_service_order = true;


        if (($this->session->userdata['role'] == 3)) {

          $show_customer = false;

        }


        // if (condition) {
        //   # code...
        // } else if (condition) {
        //   # code...
        // }else{

        // }
 

       ?>
     
      <?php if ($show_customer){ ?>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Customer</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Customer:</h6>
              <a class="collapse-item" href="<?php echo base_url(); ?>index.php/customer_controller/view_customers">View Customers</a>
            </div>
          </div>
        </li>

       <?php  }  ?>

        <?php if ($show_service_order){ ?>

           <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products" aria-expanded="true" aria-controls="products">
              <i class="fas fa-fw fa-cog"></i>
              <span>Service Orders</span>
            </a>
            <div id="products" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              
              <div class="bg-white py-2 collapse-inner rounded">

                <h6 class="collapse-header">Service:</h6>

                <a class="collapse-item" href="<?php echo base_url(); ?>index.php/service_orders_controller/view_orders">View service Order</a>

              </div>
            </div>
          </li>

        <?php  }  ?>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Inventory</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Item Records:</h6>

            <a class="collapse-item" href="<?php echo base_url(); ?>index.php/inventory_controller/add_item">Manage stock</a>

          </div>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Invoicing</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Invoice:</h6>
            <a class="collapse-item" href="<?php echo base_url(); ?>index.php/invoice_controller/view_invoice">Invoice</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/reports_controller/reports">
          <i class="fas fa-fw fa-table"></i>
          <span>Reports</span></a>
      </li>




      <!-- Divider -->
      <hr class="sidebar-divider">  
    
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->