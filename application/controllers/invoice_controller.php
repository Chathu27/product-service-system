<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class invoice_controller extends CI_Controller {

	public function __construct(){ 
	    parent::__construct();  
	    $this->load->model('invoice_model');

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

		$data = $this->input->post(); 

		$result = $this->invoice_model->insert_invoice_data($data);  
		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}


	public function get_all_invoice_data(){   

		$result = $this->invoice_model->get_all_invoice_details(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	}

}