<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class estimates_controller extends CI_Controller {

	public function __construct(){ 
	    parent::__construct();  
	    $this->load->model('estimates_model');

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');
        }
	}


	public function add_estimates(){
		$this->load->view('estimates/add_estimates');
	}

	public function view_estimates(){
		$this->load->view('estimates/view_estimates');
	}
	
	public function edit_estimates(){
		$this->load->view('estimates/edit_estimates');
	}


	public function add_estimate_data(){  

		$estimate_data = array( 
			
			'order_date' => $this->input->post('order_date'),
			'estimate_by' => $this->input->post('estimate_by'),
			'remarks' => $this->input->post('remarks'),
			'service_order_no' => $this->input->post('service_order_no'),

		);
 

		$result = $this->estimates_model->insert_estimate_data($estimate_data); 

		// print_r($result);

		$estimate_items = array( 
			'estimate_id' => $result["estimated_id"],
			'item_id' => $this->input->post('item_id'),
			'quantity' => $this->input->post('quantity'),

		);


 		$result = $this->estimates_model->insert_estimate_items($estimate_items);

 
 		$data_vals = array(
			'status' => 2,      
		);

		$update_val = array(
			'service_order_no' => $this->input->post('service_order_no'),
			'values' => $this->set_update_values($data_vals), 
		);

		$result = $this->estimates_model->update_customer_status($update_val);

 		

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);


	 	return $output;
  
	}

	public function edit_esimate_data(){  

		$data_vals = array(
			'order_date' => $this->input->post('order_date'),
			'estimate_by' => $this->input->post('estimate_by'),
			'remarks' => $this->input->post('remarks'),  
		);

		$update_val = array(
			'service_order_no' => $this->input->post('service_order_no'),
			'values' => $this->set_update_values($data_vals), 
		);

		$result = $this->estimates_model->update_estimate_data($update_val); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}

	public function edit_esimate_items(){  

		$item_vals = array( 
			'item_id' => $this->input->post('item_id'),  
			'quantity' => $this->input->post('quantity'),   
		);

		$update_item_val = array(
			'estimate_id' => $this->input->post('estimate_id'),
			'values' => $this->set_update_values($item_vals), 
		);

		$result = $this->estimates_model->update_estimate_items($update_item_val); 
		

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

	public function update_service_order_status(){  


 		$data_vals = array(
			'status' => $this->input->post('status'),
			'completed_date' => $this->input->post('completed_date'),    
		);

		$update_val = array(
			'service_order_no' => $this->input->post('service_order_no'),
			'values' => $this->set_update_values($data_vals), 
		);

		$result = $this->estimates_model->update_customer_status($update_val);

 		

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);


	 	return $output;
  
	}

  




	public function get_all_estimated_data(){   

		$result = $this->estimates_model->get_all_estimated_details(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}



	public function get_single_estimate_data(){  

		$data = array('service_order_no' => $this->input->post('service_order_no'));

		$result = $this->estimates_model->get_all_estimate_details_by_id($data); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}



	public function get_single_estimate_item_data(){  

		$data = array('service_order_no' => $this->input->post('service_order_no'));

		$result = $this->estimates_model->get_all_estimate_item_details_by_id($data); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}


 

  
}