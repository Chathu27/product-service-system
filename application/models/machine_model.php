<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class machine_model extends CI_Model {




public function get_all_machine_data(){

	 	$select_query = "SELECT * FROM `machine_models` ORDER BY machine_id DESC LIMIT 30"; 

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
