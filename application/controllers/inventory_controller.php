<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inventory_controller extends CI_Controller {

	public function __construct(){ 
	    parent::__construct();  
	    $this->load->model('inventory_model');

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');
        }
	}

	public function add_item(){
		$this->load->view('inventory/add_item');
	}

	public function edit_item(){
		$this->load->view('inventory/edit_item');
	}

	public function add_item_data(){  

		$data = array( 
			'item_name' => $this->input->post('item_name'),
			'price' => $this->input->post('price'),
			'quantity' => $this->input->post('quantity'),  
			'catagory_id' => $this->input->post('catagory_id'),
		);

		$result = $this->inventory_model->insert_item_data($data);  
		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}

		public function get_all_item_data(){   

		$result = $this->inventory_model->get_all_item_details(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}



	public function delete_item_data(){  

		$data = array('item_id' => $this->input->post('item_id'));

		$result = $this->inventory_model->delete_item($data); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	} 




	public function get_single_item_data(){  

		$data = array
		('item_id' => $this->input->post('item_id'));

		$result = $this->inventory_model->get_single_item_id($data); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}

	public function edit_item_data(){  

		$data_vals = array(
			'item_name' => $this->input->post('item_name'),
			'price' => $this->input->post('price'),
			'quantity' => $this->input->post('quantity'), 
			'catagory_id' => $this->input->post('catagory_id'), 
		);

		$update_val = array(
			'item_id' => $this->input->post('item_id'),
			'values' => $this->set_update_values($data_vals), 
		);

		$result = $this->inventory_model->update_items($update_val); 

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





}