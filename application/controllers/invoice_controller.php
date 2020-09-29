<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class invoice_controller extends CI_Controller {

	public function __construct(){ 
	    parent::__construct();  
	    // $this->load->model('invoice_model');

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');
        }
	}

	public function add_invoice(){
		$this->load->view('invoice/add_invoice');
	}

	public function view_invoice(){
		$this->load->view('invoice/view_invoice');
	}

}