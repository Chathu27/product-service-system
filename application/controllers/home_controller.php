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
			'total_open_orders' => $this->home_model->total_open_orders(), 
			'completed_orders' => $this->home_model->completed_orders(), 
			'cancelled_orders' => $this->home_model->cancelled_orders(), 
			'estimated_orders' => $this->home_model->estimated_orders(), 
			'total_orders' => $this->home_model->total_orders(), 
			'this_month_earnings' => "Rs.".$this->home_model->months_earnings(date("Y-m")), 
			'get_earnings' => $this->get_earnings(), 
		);

		$set_json_output = json_encode($arrayName,JSON_PRETTY_PRINT); 
		$output =  $this->output->set_output($set_json_output);

	 	return $output;
	}


	public function get_earnings(){ 

		for ($k = 0; $k <= 6; $k++) {

	   		if ($k <= 6) {
	   			$months[] = date("F", strtotime( date( 'Y-m' )." -$k months"));
	   		} 

	   		$value[] = $this->home_model->months_earnings(date("Y-m", strtotime( date( 'Y-m' )." -$k months")));
			
			if ($value[$k] == null ) {
				$value[$k] = 0;
			} 
 
	 
		}

		return $data["results"] = array(
			'months' => array_reverse($months) ,  
			'total_sales' =>  array_reverse($value),   

		);
		

	}


 
 
}