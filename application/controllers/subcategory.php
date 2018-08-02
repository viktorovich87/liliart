<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategory extends CI_Controller {
	
function item($id){
	
	$this->db->from("subcategories"); 
	$this->db->where("id",$id); 
	$getSubCategoryName['getSubCategoryName'] = $this->db->get()->result_array();
	 foreach ($getSubCategoryName['getSubCategoryName'] as $newgetSubCategoryName):
		$active_menu = $newgetSubCategoryName['category'];
	 endforeach;
		$newdata = array(
                   'active_menu'  => $active_menu,
                   'logged_in' => TRUE
               );

	$this->session->set_userdata($newdata);
					
					
	$data['id'] = $id;
	$this->load->view('subcategory_item' ,$data);
	
}


}