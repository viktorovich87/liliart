<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Help extends CI_Controller {
	
function index(){

	
	$newdata = array(
               'category'  => "help",
			   'active_menu'  => "",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
	$this->load->view('help');
}



}