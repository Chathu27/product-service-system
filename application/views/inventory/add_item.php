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

                <form id="myform" class="form-inline box_form" novalidate="novalidate">

                  <div class="alert alert-success alert-dismissible d-none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Item details added successfully.
                  </div> 

                  <div class="row">

                  <div class="form-group">
                    <label for="name">Catagory</label>
                    <select class="form-control" name="catagory_id" id="catagory_id"></select> 
                  </div>

                  <div class="form-group">
                    <label for="name">Item Name</label>
                    <input type="text" class="form-control" id="item_name" name="item_name"> 
                  </div>

                    <div class="form-group">
                    <label for="name">Price</label>
                    <input type="text" class="form-control" id="price" name="price">
                  </div>

                    <div class="form-group">
                    <label for="name">Quantity</label>
                    <input type="number" name="quantity" id="quantity">
                    </div>
                    </div>

                  <button type="submit" class="btn btn-primary" id="login_btn"name="add">Add item</button>




 
                </form> 
                      <div class="col-lg-6 mt-5">
                        <div class="card shadow">
                            <div class="card-body">
                                <h4 class="header-title">Add Items</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table editable_table">
                                            <thead class="text-uppercase">
                                                <tr class="table-active">
                                                    <th scope="col">Catorgory ID</th>
                                                    <th scope="col">Catorgory Name</th>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
          
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
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

</body>

</html>

<script>
 $(document).ready(function () { 

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
              
              item_id: $('#item_id').val(), 
              item_name: $('#item_name').val(),
              price: $('#price').val(), 
              quantity: $('#quantity').val(), 
              catagory_id: $('#catagory_id').val(), 
            }
 
            $.ajax({
            url: '<?php echo base_url(); ?>index.php/inventory_controller/add_item_data',
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


      $.ajax({
            url: '<?php echo base_url(); ?>index.php/inventory_controller/get_all_item_data',
            type: 'POST',  
          })
            .done(function(data) {

              var output = JSON.parse(data);
              console.log(output);
         
              if (output.status == 200) {  

              for (var i = 0; i < output.data.length; i++) {

            

            $('.editable_table tbody').append(`
              <tr>
                  <td>`+output.data[i].catagory_id+`</td> 
                  <td>`+output.data[i].catagory_name+`</td> 
                  <td>`+output.data[i].item_id+`</td>
                  <td>`+output.data[i].item_name+`</td> 
                  <td>`+output.data[i].price+`</td> 

                  <td>`+output.data[i].quantity+`</td>

                  <td>  

                    <a href="javascript:void(0)" data-id="`+output.data[i].item_id+`" class="delete_item"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                    </a> 


                  </td>
                </tr>`);

          }  

          $('table').DataTable({

              dom: 'Bflrtip',
              buttons: [
                  {
                    extend: 'copy',
                    text: '<h5>Export Report to :</h5>'
                }, 
                'csv', 'excel', 'pdf', 'print'
          ]
          });
          
        }

      })
      .fail(function() {
        console.log("error");
      });


   $('html .editable_table tbody').on('click', '.delete_item', function(event) {
      event.preventDefault();

      var id = $(this).attr('data-id');
     
      bootbox.confirm({
        title: "Delete Item",
          message: "Do you want to delete this? This cannot be undone.",
          buttons: {
              cancel: {
                  label: 'Cancel'
              },
              confirm: {
                  label: 'Delete'
              }
          },
          callback: function (result) {
              
              if (result) {

                $.ajax({
                  url: '<?php echo base_url(); ?>index.php/inventory_controller/delete_item_data',
                  type: 'POST', 
                  data: {item_id: id},
                })
                .done(function(data) {

                  var output = JSON.parse(data);
         
                if (output.status == 200) { 
                location.reload();
                } 

                  
                })
                .fail(function() {
                  console.log("error");
                }) 

              }
          }
      });
      
    });








 });
</script>




    
 
    




