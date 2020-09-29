<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product Service System |Invoice</title>

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
              <h2 class="h3 mb-2 text-gray-800">Invoice</h2> 
            </div>
             
             <div class="card shadow">

              <div class="card-body"> 
               
              <form  id="myform" class="col-md-12 box_form" novalidate="novalidate"> 

              <div class="alert alert-success alert-dismissible d-none">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Invoice data added successfully.
              </div> 

             
                <div class="row">
                  <div class="modal-body">
                    <ul>
                      <li><label for="service_order_no">Service order no</label> <span id="service_order_no" name = "service_order_no"></span></li>

                      <li><label for="first_name">Customer</label> <span id="first_name"></span> <span id="last_name"></span></li>  

                      <li><label for="first_name">Customer Address </label> <span id="addr"></span></li>

                      <li><label for="contact_no">Contact No </label> <span id="contact_no"></span> </li>

                      <li><label for="machine_model">Machine Model</label> <span id="machine_model"></span></li>

                      <li><label for="serial_no">Serial No</label> <span id="serial_no"></span></li>

                      <li><label for="estimate_id">Estimate no</label> <span id="estimate_id"></span> <span id="estimate_id"></span></li>

                       <li><label for="completed_date">Complete Date</label> <span id="completed_date"></span> <span id="completed_date"></span></li> 

                       <li><label for="invoice_date">Invoice Date</label> <span id="invoice_date"></span> <span id="invoice_date"></span></li> 
                      
                    </ul>
                  </div> 
                </div>

              <div class="row">


                </div>

                <div class="form-group table-responsive">
                      <table class="table" id="invoice_table">
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

         
                  <button type="submit" class="btn btn-primary" id="login_btn">Save Invoice</button>

                  <a href="<?php echo base_url(); ?>index.php/home_controller/" class="btn btn-secondary">Cancel</a> 
               
               
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

  


     var price = 0;
     var item_id = 0;
     var quantity = 0;
     var total = 0;

   /*get item codes*/

/*--*/
  

    $.ajax({
      url: '<?php echo base_url(); ?>index.php/service_orders_controller/get_single_order_data',
        type: 'POST', 
        data: { service_order_no: getQueryVariable("service_order_no")},
    })
    .done(function(data) {
      
      var output = JSON.parse(data); 
     


      if (output.status == 200) {
          console.log(output);

        $('#service_order_no').html(output.data.service_order_no);
        $('#first_name').html(output.data.first_name); 
        $('#last_name').html(output.data.last_name); 
        $('#contact_no').html(output.data.contact_no);
        $('#addr').html(output.data.addr);
        $('#machine_model').html(output.data.machine_model);
        $('#serial_no').html(output.data.serial_no);
        $('#accessories').html(output.data.accessories);
        $('#remarks').html(output.data.remarks);
        $('#completed_date').html(output.data.completed_date);
        $('#invoice_date').html(shortDate);

         
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
     
      console.log(output,"ppp");

      for (var i = 0; i < output.data.length; i++) {

          var quantity =  (output.data[i].quantity);
          var price = (output.data[i].price);
          var total = parseInt(quantity)*parseInt(price);


    $('#invoice_table tbody').append(`
              <tr>
                  <td>`+output.data[i].item_id+`</td> 
                  <td>`+output.data[i].item_name+`</td> 
                  <td>`+output.data[i].quantity+`</td>
                  <td>`+output.data[i].price+`</td> 

                  <td>`+total+`</td>
                  <td><button class="add_btn" data-id="`+i+`">Add</button></td>

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


    
    $('html').click(".add_btn", function(event) {
      /* Act on the event */
      alert();
    });


    /* Validate Form */

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg !== value;
    }, "Please select an option.");

      $('#myform').validate({ 

          rules: {
              // customer_id: {
              // valueNotEquals: "default"  

              // },
              // order_date: {
              //     required: true, 
              // },
              // machine_id: {
              //     required: true,
              //     valueNotEquals: "default"
              // },
              // serial_no: {
              //     required: true, 
              // },
              // accessories: {
              //     required: true, 
              // }, 
              // remarks: {
              //     required: true, 
              // }, 
          },

      //     submitHandler: function(form) { 
      
      //       var data = {
      //       service_order_no: getQueryVariable("service_order_no"), 
      //       order_date: $('#order_date').val(),
      //       estimate_by: $('#estimate_by').val(), 
      //       remarks: $('#feed_back').val(),
      //       item_id: $('#item_id').val(),
      //       quantity: $('#quantity').val(),             
      //       }
 
      //       $.ajax({
      //         url: '<?php echo base_url(); ?>index.php/estimates_controller/add_estimate_data',
      //         type: 'POST', 
      //         data: data,
      //       })
      //       .done(function(data) {
  
      //         var output = JSON.parse(data);
              
      //         if (output.status == 200) { 
      //           $('.alert-success').removeClass('d-none'); 
      //           window.scroll(0, 0)
      //           $('#myform')[0].reset();
      //         }

      //       })
      //       .fail(function() {
      //         console.log("error");
      //       }); 
      
      // }
      });





 });

</script>





