<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iurinfo extends CI_Controller {
	
function index(){

	$this->load->view('adminpanel/iurinfo');
	$newdata = array(
               'category'  => "7897987",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
	
}

function info(){

	$this->load->view('iurinfo');
	$newdata = array(
               'category'  => "7897987",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
	
}


}