<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class home_controller extends CI_Controller {

    public function __construct() {

        parent::__construct(); 

        $this->load->model('home_model'); 

        if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php'); 
        }else{

        	//print_r($this->session->userdata());
        	 if ($this->session->userdata['role'] == 1){ 
        	 	
			}
        }

       
 
	}

	public function index(){
		$this->load->view('home_page');
	}
 
 
	public function get_stats(){ 

		$result = $this->home_model->get_total_orders(); 

		$arrayName = array(
			// 'total_monthly_earnings' => $this->home_model->get_total_reservations(), 
			'total_open_orders' => $this->home_model->total_open_orders(), 
			'completed_orders' => $this->home_model->completed_orders(), 
			// 'total_drivers' => $this->home_model->get_total_drivers(), 
			// 'get_monthly_income' => $this->home_model->get_monthly_income(), 
			// 'pending_income' => $this->home_model->get_pending_income(), 
		);

		$set_json_output = json_encode($arrayName,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
	}
 
 
}