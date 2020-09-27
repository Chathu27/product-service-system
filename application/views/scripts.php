<script src="<?php echo base_url();?>assets/js/vendor/jquery/jquery.min.js"></script>

  <script src="<?php echo base_url();?>assets/js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/js/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url();?>assets/js/vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo/jquery.validate.min.js"></script>



  <!-- Page level custom scripts -->
  <script src="<?php echo base_url();?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo/chart-pie-demo.js"></script>

  <script src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo/dataTables.buttons.min.js"></script>

  <script src="<?php echo base_url();?>assets/js/demo/buttons.flash.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo/jszip.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo/pdfmake.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo/vfs_fonts.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo/buttons.html5.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo/buttons.print.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo/bootbox.min.js"></script>



 
 <script type="text/javascript">
   var app_url = "<?php echo base_url(); ?>"
   var today = new Date();

  var month = ('0' + (today.getMonth() + 1)).slice(-2);
  // make date 2 digits
  var date = ('0' + today.getDate()).slice(-2);
  // get 4 digit year
  var year = today.getFullYear();
  // concatenate into desired arrangement
  var shortDate = year + '-' + month + '-' + date;


  var role_id = "<?php echo $_SESSION['role']; ?>";


  // if (role_id == 3) {
  //   show_customer = false;
  // }




 </script>


