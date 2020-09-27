
  $(document).ready(function () {

      $.ajax({
        url: app_url+'index.php/service_orders_controller/get_all_estimated_data',
        type: 'POST',  
      })
          .done(function(data) {

        var output = JSON.parse(data);
        console.log(output);

        var label = "";
        var view_btn = "";
        var edit_btn = "";
        var delete_btn = "";
        var buttons = "";
         
        if (output.status == 200) {  

          for (var i = 0; i < output.data.length; i++) {

            var total = 0;


            var service_order_no = output.data[i].service_order_no;
            var name = output.data[i].first_name+` `+output.data[i].last_name;
            var contact_no = output.data[i].contact_no;
            
           
            var machine_model = output.data[i].machine_model;
            var serial_no = output.data[i].serial_no;
            var order_date = output.data[i].order_date;
            var accessories = output.data[i].accessories;
            var remarks = output.data[i].remarks;
            var status = output.data[i].status;

            console.log(status)


            view_btn = `<a href="`+app_url+`index.php/estimates_controller/view_estimates/?service_order_no=`+output.data[i].service_order_no+`&status=`+output.data[i].status+`" class="edit_item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View
                    </a>`;
            edit_btn = `<a href="`+app_url+`index.php/service_orders_controller/edit_service_order/?service_order_no=`+output.data[i].service_order_no+`" class="edit_item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                    </a>`;
            delete_btn = `<a href="javascript:void(0)" data-id="`+output.data[i].service_order_no+`" class="delete_item"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                    </a>`;

            
 
            if (output.data[i].status == 1) {
            label = '<span class="badge badge-success">Open</span>'
            }else if (output.data[i].status == 2) {
              label = '<span class="badge badge-warning">Estimated</span>'
            
            }else if (output.data[i].status == 3) {
              label = '<span class="badge badge-primary">Approved</span>'
            
            }else if (output.data[i].status == 4) {
              label = '<span class="badge badge-primary">Completed</span>'

            }else if (output.data[i].status == 6) {
              label = '<span class="badge badge-primary">In Progress</span>'
              
            }else{
              label = '<span class="badge badge-danger">Canceled</span>' 
            }
           


            if (role_id == 3) { 
              buttons = view_btn ;

            }else if( role_id == 1 && output.data[i].status == 2 ) {
               console.log(role_id, output.data[i].status)
              buttons = view_btn;


            }else if (role_id == 2 && output.data[i].status == 2 ) {
              console.log(role_id, output.data[i].status)
              buttons = view_btn;

            }else{
              buttons = view_btn  
              
            }


            $('.estimated tbody').append(`
              <tr>
                  <td>`+service_order_no+`</td>
                  <td>`+name+`</td>
                  <td>`+contact_no+`</td>
                  <td>`+machine_model+`</td>
                  <td>`+serial_no+`</td>
                  <td>`+order_date+`</td>
                  <td>`+accessories+`</td>
                  <td>`+remarks+`</td>
                  <td>`+label+`</td> 
                  <td>`+buttons+`</td>
                </tr>`);

          }  


          
        }

      })
      .fail(function() {
        console.log("error");
      });



      
    }) 

    function view_order(id){
     
    $("#myModal").modal();

    $("#myModal").addClass('estimated_orders');

    $.ajax({
      url: app_url+'index.php/service_orders_controller/get_single_order_data',
        type: 'POST', 
        data: { service_order_no: id},
    })
    .done(function(data) {

      var output = JSON.parse(data); 
      console.log(output.data);


      if (output.status == 200) {

        $('.estimated_orders #service_order_no').html(output.data.service_order_no);
        $('.estimated_orders #order_date').html(output.data.order_date);
        $('.estimated_orders #first_name').html(output.data.first_name);
        $('.estimated_orders #last_name').html(output.data.last_name);
        $('.estimated_orders #contact_no').html(output.data.contact_no);
        $('.estimated_orders #machine_model').html(output.data.machine_model);
        $('.estimated_orders #serial_no').html(output.data.serial_no); 
        $('.estimated_orders #accessories').html(output.data.accessories);  
        $('.estimated_orders #remarks').html(output.data.remarks);  
        $('.estimated_orders #status').html(output.data.status); 

  

 
            if (output.data.status == 1) {
            label = '<span class="badge badge-success">Open</span>'
            }else if (output.data.status == 2) {
              label = '<span class="badge badge-warning">Estimated</span>'
            
            }else if (output.data.status == 3) {
              label = '<span class="badge badge-primary">Approved</span>'
            
            }else if (output.data.status == 4) {
              label = '<span class="badge badge-primary">Completed</span>'
            
            }else{
              label = '<span class="badge badge-danger">Canceled</span>' 
            }


        

        $('.estimated_orders #status').html(label);


      }

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }

