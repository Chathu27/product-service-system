<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class catagory_model extends CI_Model {




public function get_all_catagories(){

	 	$select_query = "SELECT * FROM `catagory` ORDER BY catagory_id DESC LIMIT 5"; 

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

}
