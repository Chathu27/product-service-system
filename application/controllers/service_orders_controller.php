<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service_orders_controller extends CI_Controller {

	public function __construct(){ 
	    parent::__construct();  
	    $this->load->model('service_order_model');

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');
        }
	}

	public function service_orders(){
		$this->load->view('orders/service_orders');
	}
	public function view_orders(){
		$this->load->view('orders/view_orders');
	}

	public function edit_service_order(){
		$this->load->view('orders/edit_service_order');
	}


	public function add_service_order_data(){  

		$data = array( 
			'customer_id' => $this->input->post('customer_id'),
			'machine_id' => $this->input->post('machine_id'),
			'order_date' => $this->input->post('order_date'),  
			'serial_no' => $this->input->post('serial_no'),   
			'accessories' => $this->input->post('accessories'),  
			'remarks' => $this->input->post('remarks'),  
			'status' => $this->input->post('status'),
			 
		);

		$result = $this->service_order_model->insert_service_order_data($data); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}

		public function get_all_service_order_data(){   

		$result = $this->service_order_model->get_all_service_order_details(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	} 

	public function get_single_order_data(){  

		$data = array
		('service_order_no' => $this->input->post('service_order_no'));

		$result = $this->service_order_model->get_all_order_details_by_id($data); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}

	public function edit_service_order_data(){  

		$data_vals = array(
			'customer_id' => $this->input->post('customer_id'),
			'order_date' => $this->input->post('order_date'),
			'customer_id' => $this->input->post('customer_id'),
			'machine_id' => $this->input->post('machine_id'),  
			'serial_no' => $this->input->post('serial_no'),  
			'accessories' => $this->input->post('accessories'),  
			'remarks' => $this->input->post('remarks'),    
		);

		$update_val = array(
			'service_order_no' => $this->input->post('service_order_no'),
			'values' => $this->set_update_values($data_vals), 
		);

		$result = $this->service_order_model->update_service_order_data($update_val); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}


	public function set_update_values($dataset){
		$values = '';
		$insert_vals =  array();

		$get_columns = array_keys($dataset);
		$get_values = array_values($dataset);

		for ($i=0; $i <  sizeof($get_columns) ; $i++) { 
			 
			if ($i == 0) {
				$values = "`".$get_columns[$i]."`='".$get_values[$i]."'";
			}else{
				$values = $values.",`".$get_columns[$i]."`='".$get_values[$i]."'";
			}
		}


		return $values;

	}

	public function get_all_open_service_order_data(){   

		$result = $this->service_order_model->get_all_open_orders(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}



	public function get_all_completed_service_order_data(){   

		$result = $this->service_order_model->get_all_completed_orders(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}

	public function get_all_in_progress_data(){   

		$result = $this->service_order_model->get_all_progress_orders(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  	}



	public function get_all_estimated_data(){   

		$result = $this->service_order_model->get_all_estimated_orders(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
  
	}



	public function get_all_approved_data(){   

		$result = $this->service_order_model->get_all_approved_orders(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
  
	}


		public function delete_service_order_data(){  

		$data = array('service_order_no' => $this->input->post('service_order_no'));

		$result = $this->service_order_model->delete_order($data); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}



	
}