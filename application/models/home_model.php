<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model {
 
	public function get_total_orders(){

	 	$select_query = "SELECT COUNT(service_order_no) AS value FROM `service_orders`"; 
		$query = $this->db->query($select_query);

		return $query->result()[0]->value;
	}


	public function total_open_orders(){

	 	$select_query = "SELECT COUNT(service_order_no) AS value FROM `service_orders` WHERE status = 1"; 
		$query = $this->db->query($select_query);

		return $query->result()[0]->value;
	}

	public function completed_orders(){

	 	$select_query = "SELECT COUNT(service_order_no) AS value FROM service_orders WHERE status = 4"; 
		$query = $this->db->query($select_query);

		return $query->result()[0]->value;
	}


	public function cancelled_orders(){

	 	$select_query = "SELECT COUNT(service_order_no) AS value FROM service_orders WHERE status = 5"; 
		$query = $this->db->query($select_query);

		return $query->result()[0]->value;
	}


	public function estimated_orders(){

	 	$select_query = "SELECT COUNT(service_order_no) AS value FROM service_orders WHERE status = 2"; 
		$query = $this->db->query($select_query);

		return $query->result()[0]->value;
	}


	public function total_orders(){

	 	$select_query = "SELECT COUNT(service_order_no) AS value FROM service_orders"; 
		$query = $this->db->query($select_query);

		return $query->result()[0]->value;
	}


	public function months_earnings($month){

	 	$select_query = 'SELECT SUM(total) AS value FROM invoice WHERE invoice_date BETWEEN "'.$month.'-01" AND "'.$month.'-31"'; 
		$query = $this->db->query($select_query);

		return $query->result()[0]->value;
	}
	


	
	
}



