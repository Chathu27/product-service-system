<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reports_controller extends CI_Controller {

	// public function __construct(){ 
	//     parent::__construct();  
	//     $this->load->model('estimates_model');

	//     if (!isset($this->session->userdata['logged_in'])) {
 //        	header('Location: '.base_url().'index.php');
 //        }
	// }


	public function reports(){
		$this->load->view('reports/reports');
	}
}
