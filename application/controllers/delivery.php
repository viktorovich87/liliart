<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery extends CI_Controller {
	
function index(){

	
	$newdata = array(
               'category'  => "delivery",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
	$this->load->view('adminpanel/delivery');
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