<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {
	
function index(){

	
	$newdata = array(
               'category'  => "cart",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
		$this->load->view('checkout');
	
}


}