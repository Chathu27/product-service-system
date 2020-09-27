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

		$result = $this->inventory_model->get_item_id_name($data); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}







}