<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inventory_model extends CI_Model {

public function __construct(){ 

		parent::__construct();  
	    $this->load->model('inventory_model');

	    if (!isset($this->session->userdata['logged_in'])) {
        	header('Location: '.base_url().'index.php');

        }
	}

public function insert_item_data($data){
 
		$values = "'" . implode("','", $data) . "'";

		$insert_query = "INSERT INTO  `product_items`(`item_name`,`price`, `quantity`,`catagory_id`) VALUES (".$values.");";



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



	public function get_all_item_details(){

	 	$select_query = "SELECT p.*, ca.catagory_name 

	 	FROM product_items As p, catagory As ca

	 	 WHERE ca.catagory_id = p.catagory_id ORDER BY p.item_id DESC"; 

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

		public function get_item_id_name(){

	 	$select_query = "SELECT item_id, item_name,price,quantity,catagory_id FROM product_items"; 

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

	public function update_items($data){
    
		$update_query =  "UPDATE `product_items` SET ".$data['values']." WHERE item_id='".$data['item_id']."'" ;


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

}