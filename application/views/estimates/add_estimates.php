<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product Service System | Edit Customer</title>

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
              <h2 class="h3 mb-2 text-gray-800">Add Estimate</h2> 
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
                      
                    </ul>
                  </div> 
                </div>

              <div class="row">

                  <div class="form-group col-md-4">
                      <label for="estimate_by">Estimated By </label>
                      <input type="text" name="estimate_by" id="estimate_by" class="form-control">
                  </div>


                  <div class="form-group col-md-4">
                      <label for="order_date">Date</label>
                      <input type="Date" name="order_date"  class="form-control" id="order_date">
                  </div>


                </div>

                <div class="row">

                      <div class="form-group col-md-8">
                      <label for="feed_back">Remarks</label>
                      <textarea type="text" name="feed_back"  class="form-control" id="feed_back"></textarea>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6"><h3>Item List</h3></div> 
                  <div class="col-md-6"><button class="btn btn-primary add_btn pull-right">Add Item</button></div>
                </div> <br/> 
                <div class="form-group table-responsive">  
                  <table class="table" id="estimate_table">
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


                    <h3>Total Amount : <span id="total_amount"></span></h3>

                </div>

         
                 
                  <button type="submit" class="btn btn-primary" >Save Estimate</button>

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
     var countId = 0;
     var item_data = []
     var total_amount = 0;
     var total_amount_array = [];

   /*get item codes*/
 

       $('html').on("change", ".item_name", function(event) {
         /* Act on the event */
         
         var id = $(this).attr("data-id")
         price = $('option:selected', this).attr("data-price");
         item_id = $('option:selected', this).attr("data-item_id");    
          $('html .select_quantity'+id).val(1);
          $('html .price'+id).val(price);
          $('html .item_id'+id).val(item_id);

          total = 1 * parseInt(price);  
          $('html .total'+id).val(total);
  
          if(item_data.length <= parseInt(id)){

            var item = { 
              item_id: item_id,
              quantity: 1,   
            }

            item_data.push(item);
            total_amount_array.push(total)

          }else{
            item_data[id].quantity = 1 
            item_data[id].item_id = item_id 
            total_amount_array[id] = total 
          }
 

          $("#total_amount").html(total_amount_array.reduce(addFunc));
            
 
       });

       $('html').on("change", ".quantity", function(event) {
          event.preventDefault();
          var id = $(this).attr("data-id")
          quantity =  $('html .select_quantity'+id).val();
          total = parseInt(quantity)* parseInt(price);

          $('html .total'+id).val(total);



          item_data[id].quantity = parseInt(quantity);
          total_amount_array[id] = total 

          $("#total_amount").html(total_amount_array.reduce(addFunc)); 

       });

/*--*/

      function addFunc(total, num) {
        return total + num;
      }
  

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

        addRow(countId++);
        getItem();
         
      }

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });


    $("html").on("click", ".add_btn", function(event) { 
      event.preventDefault();

      addRow(countId++);
      getItem(); 

    });


     $("html").on("click", ".delete_btn", function(event) { 
      event.preventDefault();

      var id = $(this).attr("data-id")
      
      item_data.splice(id, 1);
      total_amount_array.splice(id, 1);

        var index = item_data.indexOf(id);
        var index1 = total_amount_array.indexOf(id);

        if (index > -1) {
          item_data.splice(index, 1);
        }

        if (index1 > -1) {
          total_amount_array.splice(index1, 1);
        }
       
 
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


    function addRow(id){
      $("html #estimate_table tbody").append(`
            <tr>
              <td>
                <input class="form-control item_id`+id+`" name="item_id" disabled="disabled">
              </td>
              <td>
                <select class="form-control item_name item_select`+id+`" data-id="`+id+`" name="item_name" ></select>
              </td>
              <td>
                <input class="form-control quantity select_quantity`+id+`" data-id="`+id+`" name="quantity">
              </td>
              <td>
                <input class="form-control price`+id+`" name="price" disabled="disabled">
              </td>
              <td>
                <input class="form-control total`+id+`" name="total" disabled="disabled">
              </td> 
              <td>
                <button class="btn btn-danger delete_btn delete_btn`+id+`" data-id="`+id+`">Delete</button>
              </td>
            </tr>  
        `)
    }


    function getItem(){
      $.ajax({
        url: '<?php echo base_url(); ?>index.php/inventory_controller/get_all_item_data',
        type: 'POST',  
      })
      .done(function(data) {

        var output = JSON.parse(data);
        console.log(output);
         
        if (output.status == 200) {  

          $('html .item_name').append('<option value="default">Select item name</option>') 

          for (var i = 0; i < output.data.length; i++) {

            $('html .item_name').append('<option data-price="'+output.data[i].price+'" data-item_id="'+output.data[i].item_id+'" data-total="'+output.data[i].total+'"value='+output.data[i].item_name+'>'+output.data[i].item_name+'</option>') 
          }  
        }

      })

      .fail(function() {
        console.log("error");
      });
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
            item_data: item_data,         
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
                location.reload();
              }

            })
            .fail(function() {
              console.log("error");
            }); 
      
      }
      });





 });

</script>





