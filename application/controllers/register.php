<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	
function index(){
      
		
		//echo $cap['image']; die;
		$this->load->view('register');


	$newdata = array(
               'category'  => "7897987",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
 }
}