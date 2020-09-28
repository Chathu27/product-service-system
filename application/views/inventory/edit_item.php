<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product Service System | Inventory</title>

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
              <h2 class="h3 mb-2 text-gray-800">Add Item Here</h2> 
            </div>

            <div class="card shadow"> 
              <div class="card-body">
                <form id="myform" class="box_form col-md-12" novalidate="novalidate"> 
                  <div class="alert alert-success alert-dismissible d-none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Item details updated successfully.
                  </div> 

                  <div class="row"> 
                    <div class="form-group col-md-6">
                      <label for="name">Catagory</label>
                      <select class="form-control" name="catagory_id" id="catagory_id"></select> 
                    </div>
                  </div>
                  <div class="row"> 
                    <div class="form-group col-md-4">
                      <label for="name">Item ID</label>
                      <input type="text" class="form-control" id="item_id" name="item_id"> 
                    </div>
                    <div class="form-group col-md-4">
                      <label for="name">Item Name</label>
                      <input type="text" class="form-control" id="item_name" name="item_name"> 
                    </div> 
                    <div class="form-group col-md-4">
                      <label for="name">Price</label>
                      <input type="text" class="form-control" id="price" name="price">
                    </div> 
                    <div class="form-group col-md-4">
                      <label for="name">Quantity</label>
                      <input type="number" class="form-control" name="quantity" id="quantity">
                    </div>
                  </div> 
                  <button type="submit" class="btn btn-primary" id="login_btn"name="add">Save Changers</button> 
                </form>
              </div>
            </div>
                 <a class="scroll-to-top rounded" href="#page-top">
                  <i class="fas fa-angle-up"></i>
                </a>

  
  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view('scripts');  ?>

</body>

</html>
<script >

$(document).ready(function () {  


  $.ajax({
            url: '<?php echo base_url(); ?>index.php/inventory_controller/get_single_item_data',
            type: 'POST', 
            data: { item_id: getQueryVariable("item_id")},
        })
    .done(function(data) {
      
      var output = JSON.parse(data); 
     
      console.log(output);

        for (var i = 0; i < output.data.length; i++) {

          var quantity =  (output.data[i].quantity);
          var price = (output.data[i].price);
          var catagory_id = (output.data[i].catagory_id);
          var item_id = (output.data[i].item_id);

          $('#item_id').val(output.data[i].item_id);
          $('#item_name').val(output.data[i].item_name);
          $('#quantity').val(output.data[i].quantity);
          $('#price').val(output.data[i].price);
          $('#catagory_id').val(output.data[i].catagory_id);

        }          

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });


/*get catorgories*/
  $.ajax({
        url: '<?php echo base_url(); ?>index.php/catagory_controller/get_all_catagories',
        type: 'POST',  
      })
      .done(function(data) {

        var output = JSON.parse(data);
        console.log(output);
         
        if (output.status == 200) {  

          $('#catagory_id').append('<option value="default">Select category </option>') 

          for (var i = 0; i < output.data.length; i++) {

            $('#catagory_id').append('<option value='+output.data[i].catagory_id+'>'+output.data[i].catagory_id+'-'+output.data[i].catagory_name+'</option>') 
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
              item_id: getQueryVariable("item_id"),
              item_name: $('#item_name').val(),
              price: $('#price').val(), 
              quantity: $('#quantity').val(), 
              catagory_id: $('#catagory_id').val(), 
            }

  $.ajax({
            url: '<?php echo base_url(); ?>index.php/inventory_controller/edit_item_data',
            type: 'POST', 
            data: data,
          })

      .done(function(data) {
  
        var output = JSON.parse(data);
        
          if (output.status == 200) { 
          $('.alert-success').removeClass('d-none'); 
          window.scroll(0, 0) 
      }

        })
        .fail(function() {
          console.log("error");
        });


        }
        
    })

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