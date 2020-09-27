<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product Service System | View Estimate</title>

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
        <div class="container-fluid page">  
          <div class="container">

            <div class="top-header">
              <h2 class="h3 mb-2 text-gray-800">View Estimate</h2> 
            </div>
             
             <div class="card shadow">

              <div class="card-body"> 
               
              <form  id="myform" class="col-md-12 box_form" novalidate="novalidate"> 

              <div class="alert alert-success alert-dismissible d-none">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Estimate details added successfully.
              </div> 

             
                <div class="row">
                  <div class="modal-body">
                    <ul>
                      <li><label for="service_order_no">Service order no</label> <span id="service_order_no" name = "service_order_no"></span></li>

                      <li><label for="first_name">Customer</label> <span id="first_name"></span> <span id="last_name"></span></li>  

                      <li><label for="contact_no">Contact no</label> <span id="contact_no"></span> <span id="contact_no"></span></li>  

                      <li><label for="machine_model">Machine Model</label> <span id="machine_model"></span></li>

                      <li><label for="serial_no">Serial No</label> <span id="serial_no"></span></li>
                      <li><label for="accessories">Accessories</label> <span id="accessories"></span></li>
                      <li><label for="remarks">Remarks</label> <span id="remarks"></span></li>

                      <li><label for="status">Status</label> <span id="status"></span></li>
                      
                    </ul>
                  </div> 
                </div>
            

                <div>
                  <div class="modal-body">
                    <ul>

                      <li><label for="estimate_id">Estimated No</label><span id="estimate_id"></span></li>

                      <li><label for="estimate_by">Estimated By</label><span id="estimate_by"></span></li>

                      <li><label for="order_date">Estimated Date</label><span id="order_date"></span></li>

                      <li><label for="feed_back">Remarks</label><span id="feed_back"></span></li>

                    </ul>
                </div>
              </div>

                <div class="form-group table-responsive">
                      <table class="table" id="estimate_table" disabled="disabled">
                          <thead>
                              <tr>
                                <th>Item code</th>
                                <th>Item Name</th> 
                                <th>Quantity</th>
                                <th>Item Value</th>
                                <th>Total</th>
                                <th></th> 
                              </tr>
                          </thead>
                          <tbody>


                          </tbody>
                      </table>

                </div>

                <?php 

                $show_approve_btn = true;
                $show_reject_btn = true;
                $show_in_progress = true;
                $complete = true;
                $close = true;




                $routerParams = $_SERVER['QUERY_STRING']; 

                $routeArray = explode("&",$routerParams);
                $getParam = 0;

                if (array_key_exists(1, $routeArray)) {
                  $getParam = explode("=",$routeArray[1]);
                }
                
                 
                 // print_r( $getParam[1] );
                
              
 

                if (($this->session->userdata['role'] == 3) && $getParam[1] == 3) {

                  $show_approve_btn = false;
                  $show_reject_btn = false;

                } elseif (($this->session->userdata['role'] == 3) && $getParam[1] == 2) {
                  $show_approve_btn = false;
                  $show_reject_btn = false;
                  $show_in_progress = false;
                  $complete = false;

                }elseif (($this->session->userdata['role'] == 1) && $getParam[1] == 2 || ($this->session->userdata['role'] == 2) && $getParam[1] == 2 ) {
                  $show_approve_btn = true;
                  $show_reject_btn = true;
                  $show_in_progress = false;
                  $complete = false;

                }elseif (($this->session->userdata['role'] == 1) && $getParam[1] == 3|| ($this->session->userdata['role'] == 2) && $getParam[1] == 3 ) {
                  $show_approve_btn = true;
                  $show_reject_btn = true;
                  $show_in_progress = false;
                  $complete = false;


                }elseif (($this->session->userdata['role'] == 1) && $getParam[1] == 6 || ($this->session->userdata['role'] == 2) && $getParam[1] == 6  ) {
                  $show_approve_btn = false;
                  $show_reject_btn = false;
                  $show_in_progress = false;
                  $complete = false;

                }elseif (($this->session->userdata['role'] == 3) && $getParam[1] == 3) {

                  $show_approve_btn = false;
                  $show_reject_btn = false;

                }elseif (($this->session->userdata['role'] == 3) && $getParam[1] == 4 || ($this->session->userdata['role'] == 3) && $getParam[1] == 6) {

                  $show_approve_btn = false;
                  $show_reject_btn = false;
                  $show_in_progress = true;
                  $complete = true;
                
                }else{
                  $close = true;

                }

                if ($show_approve_btn){ ?> 
                  <button type="button" class="btn btn-primary" id="approve_btn">Approve</button>
                <?php  }  ?>  
                
                <?php if ($show_reject_btn){ ?> 
                  <button type="button" class="btn btn-danger" id="reject_btn">Reject</button>

                <?php  }  ?>  

                <?php if ($show_in_progress){ ?> 
                  <button type="button" class="btn btn-info" id="in_progress">In Progress</button>

                <?php  }  ?> 

                <?php if ($complete){ ?> 
                  <button type="button" class="btn btn-success" id="complete">Complete</button>

                <?php  }  ?> 
 
                <?php if ($close){ ?> 
                <a href="<?php echo base_url(); ?>index.php/service_orders_controller/view_orders" class="btn btn-secondary pull-right" id="close">Close</a> 
               <?php  }  ?>
               
            </form>
               </div>

            </div> 

          </div>
        </div>

      </div>
    </div>
  </div>

</body>

</html>
<?php $this->load->view('scripts');  ?>

<script>

  $(document).ready(function () {  

    $('#order_date').val(shortDate);


     var price = 0;
     var item_id = 0;
     var quantity = 0;
     var total = 0;
     var buttons="";
     var reject_btn="";


  $("#approve_btn").click(function(){


    var data = { 
        service_order_no: getQueryVariable("service_order_no"),
        status: 3,
    }

  $.ajax({
        url: '<?php echo base_url(); ?>index.php/estimates_controller/update_service_order_status',
        type: 'POST', 
        data: data,
  })

    .done(function(data) {

    var output = JSON.parse(data);
      
     if (output.status == 200) { 
        $('.alert-success').removeClass('d-none'); 
        window.scroll(0, 0)
        location.reload();         
      }

    })
    .fail(function() {
      console.log("error");
    }); 
        

  });

  $("#reject_btn").click(function(){

     var data = { 
     service_order_no: getQueryVariable("service_order_no"),
     status: 5,
    }

  $.ajax({
       url: '<?php echo base_url(); ?>index.php/estimates_controller/update_service_order_status',
       type: 'POST', 
       data: data,
    })
    .done(function(data) {
    
    var output = JSON.parse(data);
                
    if (output.status == 200) { 
      $('.alert-success').removeClass('d-none'); 
      window.scroll(0, 0) 
      location.reload();         
    }
      
    })
    .fail(function() {
    console.log("error");
    }); 
        

      
  });

  $("#in_progress").click(function(){

     var data = { 
     service_order_no: getQueryVariable("service_order_no"),
     status: 6,
    }

  $.ajax({
       url: '<?php echo base_url(); ?>index.php/estimates_controller/update_service_order_status',
       type: 'POST', 
       data: data,
    })
    .done(function(data) {
    
    var output = JSON.parse(data);
                
    if (output.status == 200) { 
      $('.alert-success').removeClass('d-none'); 
      window.scroll(0, 0) 
      location.reload();         
    }
      
    })
    .fail(function() {
    console.log("error");
    }); 
        

      
  });

$("#complete").click(function(){

     var data = { 
     service_order_no: getQueryVariable("service_order_no"),
     status: 4,
    }

  $.ajax({
       url: '<?php echo base_url(); ?>index.php/estimates_controller/update_service_order_status',
       type: 'POST', 
       data: data,
    })
    .done(function(data) {
    
    var output = JSON.parse(data);
                
    if (output.status == 200) { 
      $('.alert-success').removeClass('d-none'); 
      window.scroll(0, 0) 
      location.reload();         
    }
      
    })
    .fail(function() {
    console.log("error");
    }); 
        

      
  });

/*--*/

  $.ajax({
      url: '<?php echo base_url(); ?>index.php/service_orders_controller/get_single_order_data',
        type: 'POST', 
        data: { service_order_no: getQueryVariable("service_order_no")},
    })
    .done(function(data) {
      
      var output = JSON.parse(data); 
       

      if (output.status == 200) {
      


        var label = "";



        if (output.data.status == 1) {
          label = '<span class="badge badge-success">Open</span>'

        }else if (output.data.status == 2) {
          label = '<span class="badge badge-warning">Estimated</span>'
        
        }else if (output.data.status == 3) {
          label = '<span class="badge badge-primary">Approved</span>'
        
        }else if (output.data.status == 4) {
          label = '<span class="badge badge-primary">Completed</span>'

        }else if (output.data.status == 6) {
        label = '<span class="badge badge-primary">In Progress</span>'
        
        }else{
          label = '<span class="badge badge-danger">Canceled</span>' 
        }


        $('#service_order_no').html(output.data.service_order_no);
        $('#first_name').html(output.data.first_name); 
        $('#last_name').html(output.data.last_name); 
        $('#contact_no').html(output.data.contact_no);
        $('#machine_model').html(output.data.machine_model);
        $('#serial_no').html(output.data.serial_no);
        $('#accessories').html(output.data.accessories);
        $('#remarks').html(output.data.remarks);
        $('#status').html(label);

        // if (role_id == 3 && output.data[i].status == 3 ) { 
        //   console.log(role_id, output.data[i].status)
        //     buttons = complete ;

        // }else{
        //   buttons = close ;
        // }
      }

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
 



  $.ajax({
        url: '<?php echo base_url(); ?>index.php/estimates_controller/get_single_estimate_data',
        type: 'POST', 
        data: { service_order_no: getQueryVariable("service_order_no")},
    })
    .done(function(data) {
      
      var output = JSON.parse(data); 
     
    
      for (var i = 0; i < output.data.length; i++) {
        
        
          $('#estimate_id').html(output.data[i].estimate_id);
          $('#estimate_by').html(output.data[i].estimate_by);
          $('#order_date').html(output.data[i].order_date);
          $('#feed_back').html(output.data[i].remarks);
      }
          

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });


  $.ajax({
        url: '<?php echo base_url(); ?>index.php/estimates_controller/get_single_estimate_item_data',
        type: 'POST', 
        data: { service_order_no: getQueryVariable("service_order_no")},
    })
    .done(function(data) {
      
      var output = JSON.parse(data); 
     
      console.log(output);

      for (var i = 0; i < output.data.length; i++) {

          var quantity =  (output.data[i].quantity);
          var price = (output.data[i].price);
          var total = parseInt(quantity)*parseInt(price);


    $('#estimate_table tbody').append(`
              <tr>
                  <td>`+output.data[i].item_id+`</td> 
                  <td>`+output.data[i].item_name+`</td> 
                  <td>`+output.data[i].quantity+`</td>
                  <td>`+output.data[i].price+`</td> 

                  <td>`+total+`</td>

                </tr>`);

      }          

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });



      function getQueryVariable(variable){
         var query = window.location.search.substring(1);
         var vars = query.split("&");
         for (var i=0;i<vars.length;i++) {
              var pair = vars[i].split("=");
        if(pair[0] == variable){return pair[1];}
         }
         return(false);
    } 



  


 });

</script>




