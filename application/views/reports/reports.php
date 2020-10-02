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

            <h4 class="header-title">Reports</h4>

            <div class="card shadow"> 
              <div class="card-body">
                <form id="myform" class="box_form col-md-12" novalidate="novalidate"> 
                  <div class="alert alert-success alert-dismissible d-none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Item details added successfully.
                  </div> 

                  <div class="row"> 
                    <div class="form-group col-md-6">
                      <label for="name">Select Report</label>
                      <select class="form-control" name="catagory_id" id="catagory_id">
                        <option>Monthly Revenue</option> 
                      </select> 
                    </div>
                  </div>
                  <div class="row"> 
                    <div class="form-group col-md-4">
                      <label for="name">Start Date</label>
                      <input type="date" class="form-control" id="start_date" name="start_date"> 
                    </div> 
                    <div class="form-group col-md-4">
                      <label for="name">End Date</label>
                      <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>  
                  </div> 
                  <button type="submit" class="btn btn-primary" id="generate_btn"name="add">Generate Report</button>
                </form>
              </div>
            </div>
            
            <br/> 

             <div class="card shadow table-area d-none"> 
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
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <br/>
                        <h3 id="total_revenue">Total Revenue <span>0</span></h3>
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

    var datatable_init = false;
    var total = 0;
     
   $("#generate_btn").click(function(event) {
        event.preventDefault();

        $(".table-area").removeClass('d-none');
        
        if (datatable_init == true) { 
          total = 0;
          $('table').DataTable().clear().destroy();
        }

        $('.invoice_table tbody').html("");

        datatable_init = true;

        console.log( $('.invoice_table tbody') )

        $.ajax({
            url: '<?php echo base_url(); ?>index.php/invoice_controller/get_all_invoice_data_by_date',
            type: 'POST', 
            data: {
              start_date: $("#start_date").val(),
              end_date: $("#end_date").val(),
            }
        })
        .done(function(data) {
          
          var output = JSON.parse(data); 
          

          for (var i = 0; i < output.data.length; i++) { 
               
              $('.invoice_table tbody').append(`
                  <tr>
                    <td>`+output.data[i].inv_id+`</td> 
                    <td>`+output.data[i].service_order_no+`</td> 
                    <td>`+output.data[i].first_name+` `+output.data[i].last_name+`</td> 
                    <td>`+output.data[i].invoice_date+`</td> 
                    <td>`+output.data[i].remarks+`</td>
                    <td>`+output.data[i].total+`</td> 
                  </tr>`); 
              total = total + parseFloat(output.data[i].total);
          }      

          $("#total_revenue span").html(total)
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

        

        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
   });
 
  </script>
 

</body>

</html>
