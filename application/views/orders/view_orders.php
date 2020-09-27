<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product Service System | Dashboard</title>
  

  <!-- Custom fonts for this template-->
  <?php $this->load->view('styles');  ?> 

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('nav');  ?> 

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view('topbar');  ?> 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        <div class="container-fluid page">  
            <div class="container">

              <div class="top-header">
                <h2>View Orders</h2> 

                <div class="card shadow">

                    <div class="card-body"> 

                      <?php 

                        $show_create_order_btn = true;

                        if (($this->session->userdata['role'] == 3)) {

                          $show_create_order_btn = false;
                          
                        }

                        if ($show_create_order_btn) { 

                      ?>
                       
                   
                        <a href="<?php echo base_url(); ?>index.php/service_orders_controller/service_orders" class="btn btn-primary add_button" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Create new service order</a>

                        <?php } ?>

                    </div>  
                    
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#all-so" role="tab" aria-controls="nav-home" aria-selected="true">All</a>

                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#open-so" role="tab" aria-controls="nav-profile" aria-selected="false">Open</a>

                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#estimated-so" role="tab" aria-controls="nav-contact" aria-selected="false">Estimate</a>


                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#approved-so" role="tab" aria-controls="nav-contact" aria-selected="false">Approved</a>

                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#progress-so" role="tab" aria-controls="nav-contact" aria-selected="false">In Progress</a>

                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#completed-so" role="tab" aria-controls="nav-contact" aria-selected="false">Completed</a>

                         


                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="all-so" role="tabpanel" aria-labelledby="nav-home-tab">
                        
                        <table class="table all">
                          <thead>
                              <tr>
                                <th>Service Order No</th>
                                <th>Customer Name</th> 
                                <th>Contact</th>
                                <th>Machine Model</th>
                                <th>Serial No</th>
                                <th>Order Recived Date</th>
                                <th>Accessories</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th></th> 
                                 
                              </tr>
                          </thead>
                          <tbody> 

                          </tbody>
                      </table>

                      </div>
                      <div class="tab-pane fade" id="open-so" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <table class="table open">
                          <thead>
                              <tr>
                                <th>Service Order No</th>
                                <th>Customer Name</th> 
                                <th>Contact</th>
                                <th>Machine Model</th>
                                <th>Serial No</th>
                                <th>Order Recived Date</th>
                                <th>Accessories</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th></th> 
                                 
                              </tr>
                          </thead>
                          <tbody> 

                        </tbody>
                      </table>

                      </div>
                      <div class="tab-pane fade" id="completed-so" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <table class="table completed_orders">
                          <thead>
                              <tr>
                                <th>Service Order No</th>
                                <th>Customer Name</th> 
                                <th>Contact</th>
                                <th>Machine Model</th>
                                <th>Serial No</th>
                                <th>Order Recived Date</th>
                                <th>Accessories</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th></th> 
                                 
                              </tr>
                          </thead>
                          <tbody> 

                        </tbody>
                      </table>
                        
                      </div>
                          <div class="tab-pane fade" id="estimated-so" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <table class="table estimated">
                          <thead>
                              <tr>
                                <th>Service Order No</th>
                                <th>Customer Name</th> 
                                <th>Contact</th>
                                <th>Machine Model</th>
                                <th>Serial No</th>
                                <th>Order Recived Date</th>
                                <th>Accessories</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th></th> 
                                 
                              </tr>
                          </thead>
                          <tbody> 

                        </tbody>
                      </table>
                        
                      </div>
                      <div class="tab-pane fade" id="approved-so" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <table class="table approved">
                          <thead>
                              <tr>
                                <th>Service Order No</th>
                                <th>Customer Name</th> 
                                <th>Contact</th>
                                <th>Machine Model</th>
                                <th>Serial No</th>
                                <th>Order Recived Date</th>
                                <th>Accessories</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th></th> 
                                 
                              </tr>
                          </thead>
                          <tbody> 

                        </tbody>
                      </table>
                        
                      </div>

                      <div class="tab-pane fade" id="progress-so" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <table class="table progress_orders">
                          <thead>
                              <tr>
                                <th>Service Order No</th>
                                <th>Customer Name</th> 
                                <th>Contact</th>
                                <th>Machine Model</th>
                                <th>Serial No</th>
                                <th>Order Recived Date</th>
                                <th>Accessories</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th></th> 
                                 
                              </tr>
                          </thead>
                          <tbody> 

                        </tbody>
                      </table>
                        
                      </div>
                    </div>

              

                </div>
              </div>


              <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content"> 
                  <div class="modal-header">
                    <h4 class="modal-title">Service Order Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div> 
                  <div class="modal-body">
                    <ul>
                      <li><label for="service_order_no">Service order no</label> <span id="service_order_no"></span></li>

                      <li><label for="order_date">Order date</label> <span id="order_date"></span></li>

                      <li><label for="first_name">Customer</label> <span id="first_name"></span> <span id="last_name"></span></li>  

                      <li><label for="contact_no">Contact no</label> <span id="contact_no"></span> <span id="contact_no"></span></li>  

                      <li><label for="machine_model">Machine Model</label> <span id="machine_model"></span></li>

                      <li><label for="serial_no">Serial No</label> <span id="serial_no"></span></li>
                      <li><label for="accessories">Accessories</label> <span id="accessories"></span></li>
                      <li><label for="remarks">Remarks</label> <span id="remarks"></span></li>
                      <li><label for="status">Status</label> <span id="status"></span></li>
                    </ul>
                  </div> 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?php if ($this->session->userdata['role'] == 3){ ?>

                          <a href="#" id="add_estimate_btn" class="btn btn-primary add_button" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Estimate</a>

                    </a> 
                    <?php  }  ?>

                    <!-- <?php echo base_url(); ?>index.php/estimates_controller/add_estimates/?service_order_no= -->
                    
                  </div>
                </div>
              </div>
                  
              </div>
           </div> 
        </div>
      <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->

      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view('scripts');  ?>

  <script src="<?php echo base_url();?>assets/js/orders.js"></script>
  <script src="<?php echo base_url();?>assets/js/open_orders.js"></script>
  <script src="<?php echo base_url();?>assets/js/completed_orders.js"></script>
  

  <script src="<?php echo base_url();?>assets/js/estimated.js"></script>
  <script src="<?php echo base_url();?>assets/js/approved.js"></script>
  <script src="<?php echo base_url();?>assets/js/progress_orders.js"></script>
  

 

</body>

</html>