<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class invoice_controller extends CI_Controller {

	public function __construct(){ 
	    parent::__construct();  
	    $this->load->model('invoice_model');
	    $this->load->model('service_order_model');

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');
        }
	}

	public function add_invoice(){
		$this->load->view('invoice/add_invoice');
	}


	public function invoice(){
		$this->load->view('invoice/add_invoice');
	}

	public function view_invoice(){
		$this->load->view('invoice/view_invoice');
	}

	 

	public function add_invoice_data(){  

		$data_vals = array( 
			'inv_status' =>  1,  
		);

		$update_val = array(
			'service_order_no' => $this->input->post('service_order_no'),
			'values' => $this->set_update_values($data_vals), 
		);

		 
		$this->service_order_model->update_service_order_data($update_val);  
 
		$data = $this->input->post(); 

		$result = $this->invoice_model->insert_invoice_data($data);  
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


	public function get_all_invoice_data(){   

		$result = $this->invoice_model->get_all_invoice_details(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}


	public function get_all_invoice_data_by_date(){   

		$data = array(
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date')
		);
		 

		$result = $this->invoice_model->get_all_invoice_details_by_date($data); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}

}