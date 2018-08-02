<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactsadmin extends CI_Controller {
	
function index(){

	$this->load->view('adminpanel/contacts');
	$newdata = array(
               'category'  => "7897987",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
	
}


}