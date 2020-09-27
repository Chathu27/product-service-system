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
              <h2 class="h3 mb-2 text-gray-800">Edit Customer</h2> 
            </div>
             
             <div class="card shadow">

              <div class="card-body"> 
               
              <form  id="myform" class="col-md-12 box_form" novalidate="novalidate"> 

              <div class="alert alert-success alert-dismissible d-none">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Customer details updated successfully.
              </div> 

             
                <div class="row">
                  <div class="form-group col-md-6">
                      <label for="first_name">First Name</label>
                      <input type="text" name="first_name"  class="form-control" id="first_name">
                  </div>

                  <div class="form-group col-md-6">
                      <label for="last_name">Last Name</label>
                      <input type="text" name="last_name"  class="form-control" id="last_name">
                  </div>
                </div>

                <div class="form-group">
                    <label for="email_addr">Email Address</label>
                    <input type="text" name="email_addr"  class="form-control" id="email_addr">
                </div>

                <div class="form-group">
                    <label for="addr">Address</label>
                    <textarea name="addr" id="addr" class="form-control"  cols="30" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="contact_no">Contact No</label>
                    <input type="text" name="contact_no"  class="form-control" id="contact_no">
                </div>

                <div class="form-group">
                    <label for="nic">NIC Number</label>
                    <input type="text" name="nic"  class="form-control" id="nic">
                </div>
         
                 
                  <button type="submit" class="btn btn-primary" id="login_btn">Edit Customer</button>

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


    $.ajax({
      url: '<?php echo base_url(); ?>index.php/customer_controller/get_single_customer_data',
        type: 'POST', 
        data: { customer_id: getQueryVariable("customer_id")},
    })
    .done(function(data) {
      
      var output = JSON.parse(data); 
      console.log(output);


      if (output.status == 200) {
         

        $('#first_name').val(output.data.first_name); 
        $('#last_name').val(output.data.last_name);
        $('#email_addr').val(output.data.email_addr);
        $('#addr').val(output.data.addr); 
        $('#contact_no').val(output.data.contact_no); 
        $('#nic').val(output.data.nic); 

        if (output.data.status == '1') {
          $('#active').prop("checked", true);
        } 
         
      }

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
      
    /* Validate Form */

      $('#myform').validate({ 

          rules: {
              first_name: {
                  required: true, 
              },
              last_name: {
                  required: true, 
              },
              email_addr: {
                  required: true,
                  email: true
              },
              addr: {
                  required: true, 
              },
              contact_no: {
                  required: true, 
              }, 
              nic: {
                  required: true, 
              }, 
          },

          submitHandler: function(form) { 
            var status = 0

            if ($('#active').is(':checked')) {
              status = 1
            }else{
              status = 0
            }
      
            var data = {
            customer_id: getQueryVariable("customer_id"),
            first_name: $('#first_name').val(), 
            last_name: $('#last_name').val(),
            email_addr: $('#email_addr').val(),
            addr: $('#addr').val(), 
            contact_no: $('#contact_no').val(), 
            nic: $('#nic').val(), 
            }
 
            $.ajax({
              url: '<?php echo base_url(); ?>index.php/customer_controller/edit_customer_data',
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



