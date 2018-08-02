<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activation extends CI_Controller {
	
function index(){

	
	$newdata = array(
               'category'  => "activation",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
		$this->load->view('activation');
	
}


}