<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainModel extends CI_Model {


	
	function pagination($num, $offset)
	{
		//$this->db->limit(5);
	    $this->db->order_by('id','asc');
	    $query = $this->db->get('subcategories',$num, $offset);
	    return $query->result_array();
	}
	
	
	
	

}