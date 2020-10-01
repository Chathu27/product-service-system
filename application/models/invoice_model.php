<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class invoice_model extends CI_Model {

public function __construct(){ 

		parent::__construct();  
	    $this->load->model('invoice_model');

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');

        }
	}

	public function insert_invoice_data($data){
 
		$values = "'" . implode("','", $data) . "'";

		$insert_query = "INSERT INTO  `invoice`(`service_order_no`,`estimate_id`, `invoice_date`,`total`) VALUES (".$values.");"; 

		$query = $this->db->query($insert_query);

		if ($query) {

			$output = array(
				'status' => 200,  
				'message' => "Data Inserted Successfully", 
			);

			return $output;
			 

		}else{

			$output = array(
				'status' => 404,  
				'message' => "Data Inserted Faild", 
			);

			return $output;  
		}
 
	}



	public function get_all_invoice_details(){

	 	$select_query = "SELECT sa.*, i.*, c.* FROM invoice As i, service_orders As sa, customer AS c WHERE sa.service_order_no=i.service_order_no AND c.customer_id=sa.customer_id ORDER BY i.invoice_date DESC"; 

		$query = $this->db->query($select_query);
 
 
		if ($query) {

			$output = array(
				'status' => 200,  
				'data' => $query->result(), 
			);

			return $output; 

		}else{

			$output = array(
				'status' => 404,  
				'data' => "Invalid sql query", 
			);

			return $output;  
		}
	}

	public function delete_item($data){
   
		$insert_query = "DELETE FROM `product_items` WHERE `item_id`=".$data['item_id']."";

		$query = $this->db->query($insert_query);

		

		if ($query) {

			$output = array(
				'status' => 200,  
				'message' => "Data Deleted Successfully", 
			);

			return $output;
			 

		}else{

			$output = array(
				'status' => 404,  
				'message' => "Data Deletion Faild", 
			);

			return $output;  
		}
 
	}



	
	

	 

}