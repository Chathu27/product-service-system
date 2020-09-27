<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service_order_model extends CI_Model {

public function __construct(){ 

		parent::__construct();  
	    $this->load->model('service_order_model');

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');

        }
	}

public function insert_service_order_data($data){
 
		$values = "'" . implode("','", $data) . "'";

		$insert_query = "INSERT INTO  `service_orders`(`customer_id`,`machine_id`,`order_date`, `serial_no`, `accessories`, `remarks`,`status`) VALUES (".$values.");";


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



	public function get_all_service_order_details(){

	 	$select_query = "SELECT so.*, c.customer_id, c.first_name, c.last_name, c.contact_no, m.machine_model FROM service_orders As so, customer As c, machine_models As m WHERE c.customer_id = so.customer_id AND m.machine_id = so.machine_id ORDER BY so.service_order_no DESC"; 

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

		public function get_all_order_details_by_id($data){

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

	public function update_service_order_data($data){
    
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


		public function get_all_open_orders(){

	 	$select_query = "SELECT so.*, c.customer_id, c.first_name, c.last_name, c.contact_no, m.machine_model FROM service_orders As so, customer As c, machine_models As m WHERE c.customer_id = so.customer_id AND m.machine_id = so.machine_id AND so.status= 1 ORDER BY so.service_order_no DESC"; 

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



	public function get_all_completed_orders(){

	 	$select_query = "SELECT so.*, c.customer_id, c.first_name, c.last_name, c.contact_no, m.machine_model FROM service_orders As so, customer As c, machine_models As m WHERE c.customer_id = so.customer_id AND m.machine_id = so.machine_id AND so.status= 4 ORDER BY so.service_order_no DESC"; 

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

	public function get_all_progress_orders(){

	 	$select_query = "SELECT so.*, c.customer_id, c.first_name, c.last_name, c.contact_no, m.machine_model FROM service_orders As so, customer As c, machine_models As m WHERE c.customer_id = so.customer_id AND m.machine_id = so.machine_id AND so.status= 6 ORDER BY so.service_order_no DESC"; 

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


	public function get_all_estimated_orders(){

	 	$select_query = "SELECT so.*, c.customer_id, c.first_name, c.last_name, c.contact_no, m.machine_model FROM service_orders As so, customer As c, machine_models As m WHERE c.customer_id = so.customer_id AND m.machine_id = so.machine_id AND so.status =2 ORDER BY so.service_order_no DESC"; 
 

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


	public function get_all_approved_orders(){

	 	$select_query = "SELECT so.*, c.customer_id, c.first_name, c.last_name, c.contact_no, m.machine_model FROM service_orders As so, customer As c, machine_models As m WHERE c.customer_id = so.customer_id AND m.machine_id = so.machine_id AND so.status =3 ORDER BY so.service_order_no DESC"; 


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

		public function delete_order($data){
   
		$insert_query = "DELETE FROM `service_orders` WHERE `service_order_no`=".$data['service_order_no']."";

		$query = $this->db->query($insert_query);
		// print_r($insert_query);

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