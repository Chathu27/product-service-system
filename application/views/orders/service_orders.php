<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product Service System | Create Service Order </title>

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
              <h2 class="h3 mb-2 text-gray-800">Create service Order</h2> 
            </div>
             
             <div class="card shadow">

              <div class="card-body"> 
               
              <form  id="myform" class="col-md-12 box_form" novalidate="novalidate"> 

              <div class="alert alert-success alert-dismissible d-none">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Service order added successfully.
              </div>  

             
                <div class="row">

                  <div class="form-group col-md-6">
                      <label for="customer_id">Customer</label>
                      <select class="form-control" name="customer_id" id="customer_id"> 
                      </select>
                  </div>
               

                  <div class="form-group col-md-6">
                      <label for="order_date">Date</label>
                      <input type="Date" name="order_date"  class="form-control" id="order_date">
                  </div>

              </div>

                <div class="row">

                <div class="form-group col-md-6">
                    <label for="machine_id">Machine Model</label>
                    <select class="form-control" name="machine_id" id="machine_id">
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="serial_no">Serial No</label>
                    <input type="text" name="serial_no"  class="form-control" id="serial_no">
                </div>

              </div>

                <div class="form-group">
                    <label for="accessories">Accessories</label>
                    <textarea type="text" name="accessories"  class="form-control" id="accessories" rows="6"></textarea>
                </div>

                 <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea type="text" name="remarks"  class="form-control" id="remarks" rows="6"></textarea>
                </div>
         
                 
                  <button type="submit" class="btn btn-primary" id="login_btn">Create Order</button>

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


    $('#order_date').val(shortDate);
    
 /* Get machine*/
    $.ajax({
        url: '<?php echo base_url(); ?>index.php/machine_controller/get_all_machine_data',
        type: 'POST',  
      })
      .done(function(data) {

        var output = JSON.parse(data);
        console.log(output);
         
        if (output.status == 200) {  

          $('#machine_id').append('<option value="default">Select Machine Model</option>') 

          for (var i = 0; i < output.data.length; i++) {

            $('#machine_id').append('<option value='+output.data[i].machine_id+'>'+output.data[i].machine_model+'</option>') 
          }  
        }

      })
      .fail(function() {
        console.log("error");
      });

      /* Get customer*/

         $.ajax({
        url: '<?php echo base_url(); ?>index.php/customer_controller/get_all_customer_data',
        type: 'POST',  
      })
      .done(function(data) {

        var output = JSON.parse(data);
        console.log(output);
         
        if (output.status == 200) {  

          $('#customer_id').append('<option value="default">Select Customer </option>') 

          for (var i = 0; i < output.data.length; i++) {

            $('#customer_id').append('<option value='+output.data[i].customer_id+'>'+output.data[i].first_name+ ' - '+output.data[i].last_name+ ' - '+output.data[i].contact_no+'</option>') 
          }  
        }

      })
      .fail(function() {
        console.log("error");
      });



    /* Validate Form */

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg !== value;
    }, "Please select an option.");

      $('#myform').validate({ 

          rules: {
              customer_id: {
              valueNotEquals: "default"  

              },
              order_date: {
                  required: true, 
              },
              machine_id: {
                  required: true,
                  valueNotEquals: "default"
              },
              serial_no: {
                  required: true, 
              },
              accessories: {
                  required: true, 
              }, 
              remarks: {
                  required: true, 
              }, 
          },

          submitHandler: function(form) { 
      
            var data = {
            service_order_no: $('#service_order_no').val(), 
            customer_id: $('#customer_id').val(),
            order_date: $('#order_date').val(),
            machine_id: $('#machine_id').val(), 
            serial_no: $('#serial_no').val(), 
            accessories:$('#accessories').val(),
            remarks:$('#remarks').val(),
            status: 1,
            
            }
 
            $.ajax({
              url: '<?php echo base_url(); ?>index.php/service_orders_controller/add_service_order_data',
              type: 'POST', 
              data: data,
            })
            .done(function(data) {
  
              var output = JSON.parse(data);
              
              if (output.status == 200) { 
                $('.alert-success').removeClass('d-none'); 
                window.scroll(0, 0)
                $('#myform')[0].reset();
              }

            })
            .fail(function() {
              console.log("error");
            }); 
      
      }
      });

      

    });



</script>



