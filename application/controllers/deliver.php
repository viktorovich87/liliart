<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deliver extends CI_Controller {
	
function index(){

	
	$newdata = array(
               'category'  => "delivery",
			   'active_menu'  => "delivery",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
	$this->load->view('delivery');
}


function info(){

	$this->load->view('delivery');
	$newdata = array(
               'category'  => "7897987",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
	
}

}