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

            <h4 class="header-title">Generated Invoices</h4>

             <div class="card shadow"> 
              <div class="card-body">    
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table invoice_table" id="invoice_table">
                            <thead class="text-uppercase">
                                <tr class="table-active">
                                    <th scope="col">Invoice No</th>
                                    <th scope="col">Service Order</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Invoice Date</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Total Value</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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

  <script>

   

    $.ajax({
        url: '<?php echo base_url(); ?>index.php/invoice_controller/get_all_invoice_data',
        type: 'POST', 
    })
    .done(function(data) {
      
      var output = JSON.parse(data); 
     
      console.log(output);

      for (var i = 0; i < output.data.length; i++) { 
           
          $('.invoice_table tbody').append(`
              <tr>
                  <td>`+output.data[i].inv_id+`</td> 
                  <td>`+output.data[i].service_order_no+`</td> 
                  <td>`+output.data[i].first_name+` `+output.data[i].last_name+`</td> 
                  <td>`+output.data[i].invoice_date+`</td> 
                  <td>`+output.data[i].remarks+`</td>
                  <td>`+output.data[i].total+`</td> 

                  <td><a href="`+app_url+`index.php/invoice_controller/invoice/?service_order_no=`+output.data[i].service_order_no+`&inv_id=`+output.data[i].inv_id+`" class="edit_item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                    </a></td>

                </tr>`);


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
    })
    .always(function() {
      console.log("complete");
    });

    
  </script>

</body>

</html>
