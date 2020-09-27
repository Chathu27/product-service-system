<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class catagory_controller extends CI_Controller {

	public function __construct(){ 
	    parent::__construct();  
	    $this->load->model('catagory_model');

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');
        }
	}


	public function get_all_catagories(){   

		$result = $this->catagory_model->get_all_catagories(); 

		$set_json_output = json_encode($result,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
  
	} 


}

