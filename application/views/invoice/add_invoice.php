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

                      <li><label for="machine_model">Machine Model</label> <span id="machine_model"></span></li>

                      <li><label for="serial_no">Serial No</label> <span id="serial_no"></span></li>

                      <li><label for="estimate_no">Estimate no</label> <span id="estimate_no"></span> <span id="contact_no"></span></li>  
                      
                    </ul>
                  </div> 
                </div>

              <div class="row">

                  <div class="form-group col-md-4">
                      <label for="order_date">Invoice Date</label>
                      <input type="Date" name="invoice_date"  class="form-control" id="invoice_date">
                  </div>


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

                           <tr>
                            <td>
                              <input class="form-control" name="item_id" id="item_id">
                            </td>
                            <td>
                              <select class="form-control" name="item_name" id="item_name"></select>
                            </td>
                            <td>
                              <input class="form-control" name="quantity" id="quantity">
                            </td>
                            <td>
                              <input class="form-control" name="price" id="price">
                            </td>
                            <td>
                              <input class="form-control" name="total" id="total">
                            </td>
                          </tr> 
<!-- 
                          <tr>
                            <td><textarea name="item_code" id="item_code" cols="20" rows="1"></textarea></td>
                            <td><textarea name="item_name" id="item_name" cols="20" rows="1"></textarea></td>
                            <td><textarea name="price" id="price" cols="20" rows="1"></textarea></td>
                            <td><textarea name="quantity" id="quantity" cols="20" rows="1"></textarea></td>
                            <td><textarea name="total" id="total" cols="20" rows="1"></textarea></td>
                          </tr>  -->

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

    $('#order_date').val(shortDate);


     var price = 0;
     var item_id = 0;
     var quantity = 0;
     var total = 0;

   /*get item codes*/

    $.ajax({
        url: '<?php echo base_url(); ?>index.php/inventory_controller/get_all_item_data',
        type: 'POST',  
      })
      .done(function(data) {

        var output = JSON.parse(data);
        console.log(output);
         
        if (output.status == 200) {  

          $('#item_name').append('<option value="default">Select item name</option>') 

          for (var i = 0; i < output.data.length; i++) {

            $('#item_name').append('<option data-price="'+output.data[i].price+'" data-item_id="'+output.data[i].item_id+'" data-total="'+output.data[i].total+'"value='+output.data[i].item_name+'>'+output.data[i].item_name+'</option>') 
          }  
        }

      })

      .fail(function() {
        console.log("error");
      });


       $('#item_name').change(function(event) {
         /* Act on the event */

         price = $('option:selected', this).attr("data-price");
         item_id = $('option:selected', this).attr("data-item_id");  

       //  console.log(total, quantity, price) 
       
          $('#price').val(price);
          $('#item_id').val(item_id);
 
       });

       $('#quantity').change(function(event) {
          event.preventDefault();

          quantity =  $('#quantity').val();
          total = parseInt(quantity)* parseInt(price); 

            console.log(total, parseInt(quantity), parseInt(price) ) 
          $('#total').val(total);
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
          console.log(output);

        $('#service_order_no').html(output.data.service_order_no);
        $('#first_name').html(output.data.first_name); 
        $('#last_name').html(output.data.last_name); 
        $('#contact_no').html(output.data.contact_no);
        $('#machine_model').html(output.data.machine_model);
        $('#serial_no').html(output.data.serial_no);
        $('#accessories').html(output.data.accessories);
        $('#remarks').html(output.data.remarks);
         
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

          submitHandler: function(form) { 
      
            var data = {
            service_order_no: getQueryVariable("service_order_no"), 
            order_date: $('#order_date').val(),
            estimate_by: $('#estimate_by').val(), 
            remarks: $('#feed_back').val(),
            item_id: $('#item_id').val(),
            quantity: $('#quantity').val(),             
            }
 
            $.ajax({
              url: '<?php echo base_url(); ?>index.php/estimates_controller/add_estimate_data',
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





