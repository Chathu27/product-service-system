<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class estimates_model extends CI_Model {

public function __construct(){ 

		parent::__construct();  
	    $this->load->model('estimates_model');

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');

        }
	}



	public function insert_estimate_data($data){
 
		$values = "'" . implode("','", $data) . "'";

		$insert_query = "INSERT INTO `estimate_data`(`order_date`, `estimate_by`, `remarks`,`service_order_no`) VALUES (".$values.")";

		// print_r($insert_query);

		$query = $this->db->query($insert_query);
		


		if ($query) {

			$output = array(
				'status' => 200,  
				'message' => "Data Inserted Successfully", 
				'estimated_id' =>  $this->db->insert_id()
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


	public function insert_estimate_items($data){
 
		$values = "'" . implode("','", $data) . "'";

		$insert_query = "INSERT INTO `estimate_items`(`estimate_id`, `item_id`, `quantity`) VALUES (".$values.")";

		// print_r($insert_query );

	

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


		public function get_all_estimated_details(){

	 	$select_query = "SELECT ed.*, c.customer_id, c.first_name, c.last_name, c.contact_no

	 	FROM service_orders As so, customer As c, estimate_data As ed

	 	WHERE c.customer_id = so.customer_id AND ed.service_order_no = so.service_order_no ORDER BY ed.estimate_id DESC"; 

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


	public function get_estimate_by_id($data){

	 	$select_query = "SELECT so.*, c.customer_id, c.first_name, c.last_name, c.contact_no, m.machine_model FROM service_orders As so, customer As c, machine_models As m WHERE c.customer_id = so.customer_id AND m.machine_id = so.machine_id AND so.`service_order_no`='".$data['service_order_no']."' ";

		$query = $this->db->query($select_query);
		$results = $query->result();
 
		if (sizeof($results) == 1) {

			$output = array(
				'status' => 200,   
				'data' => $results[0]
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


	public function update_estimate_data($data){
    
		$update_query =  "UPDATE `estimate_data1` SET ".$data['values']." WHERE service_order_no='".$data['service_order_no']."'" ;


        $query = $this->db->query($update_query); 


		if ($query) {

			$output = array(
				'status' => 200,  
				'message' => "Data Updated Successfully",
				// 'estimated_id' =>  $this->db->insert_id() 
			);

			return $output;
			 

		}else{

			$output = array(
				'status' => 404,  
				'message' => "Data Update Faild", 
			);

			return $output;  
		}
 
	}

	public function update_estimate_items($data){
    
		$update_query =  "UPDATE `estimate_items` SET ".$data['values']." WHERE estimate_id='".$data['estimate_id']."'" ;
// print_r($update_query);

        $query = $this->db->query($update_query); 


		if ($query) {

			$output = array(
				'status' => 200,  
				'message' => "Data Updated Successfully", 
			);

			return $output;
			 

		}else{

			$output = array(
				'status' => 404,  
				'message' => "Data Update Faild", 
			);

			return $output;  
		}
 
	}



	public function delete_estimate_items($data){
   
		$insert_query = "DELETE FROM `estimate_items` WHERE `estimate_id`=".$data['estimate_id']."";

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





	public function update_customer_status($data){
    
		$update_query =  "UPDATE `service_orders` SET ".$data['values']." WHERE service_order_no='".$data['service_order_no']."'" ;
		

        $query = $this->db->query($update_query); 




		if ($query) {

			$output = array(
				'status' => 200,  
				'message' => "Data Updated Successfully", 
			);

			return $output;
			 

		}else{

			$output = array(
				'status' => 404,  
				'message' => "Data Update Faild", 
			);

			return $output;  
		}
 
	}


	public function get_all_estimate_details_by_id($data){

	 	$select_query = "SELECT ed.* FROM estimate_data As ed, service_orders AS so WHERE so.service_order_no = ed.service_order_no AND ed.`service_order_no`='".$data['service_order_no']."' ";


// print_r($select_query);

		$query = $this->db->query($select_query);

		
		// $results = $query->result();
 
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


	public function get_all_estimate_item_details_by_id($data){

	 	$select_query = "SELECT ei.*, p.price,p.item_name

	 	FROM estimate_items As ei, estimate_data AS ed,product_items As p

	 	WHERE ei.estimate_id = ed.estimate_id AND p.item_id = ei.item_id  AND ed.`service_order_no`='".$data['service_order_no']."' ";


// print_r($select_query);

		$query = $this->db->query($select_query);

		
		// $results = $query->result();
 
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

 



}