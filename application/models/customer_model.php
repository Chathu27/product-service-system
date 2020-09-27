<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer_model extends CI_Model {
		 

	public function get_all_customer_details(){

	 	$select_query = "SELECT * FROM `customer` ORDER BY customer_id DESC"; 

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


	public function get_latest_customer_details(){

	 	$select_query = "SELECT * FROM `customers` ORDER BY customer_id DESC LIMIT 5"; 

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



	public function get_all_active_customer_details(){

	 	$select_query = "SELECT * FROM `customers` WHERE status = 1 "; 

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


	public function insert_customer_data($data){
 
		$values = "'" . implode("','", $data) . "'";

		$insert_query = "INSERT INTO `customer`(`first_name`, `last_name`, `email_addr`, `addr`, `contact_no`, `nic`) VALUES (".$values.")";

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


	public function get_customer_by_id($data){ 
		 

	 	$select_query = "SELECT * FROM `customer` WHERE  `customer_id`='".$data['customer_id']."'"; 

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
				'message' => 'Invalid Data'
			);
			return $output;
		}
	}



	public function update_customer_data($data){
    
		$update_query =  "UPDATE `customer` SET ".$data['values']." WHERE customer_id='".$data['customer_id']."'" ;
		

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

	public function delete_customer($data){
   
		$insert_query = "DELETE FROM `customer` WHERE `customer_id`=".$data['customer_id']."";

		$query = $this->db->query($insert_query);
		print_r($insert_query);

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


