<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class machine_controller extends CI_Controller {

	public function __construct(){ 
	    parent::__construct();  
	    $this->load->model('machine_model');

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');
        }
	}


	public function get_all_machine_data(){   

		$result = $this->machine_model->get_all_machine_data(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	} 


}

