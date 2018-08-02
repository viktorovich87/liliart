<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends CI_Controller {
	
function index(){

	
	$newdata = array(
               'category'  => "7897987",
			   'active_menu'  => "contacts",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
		$this->load->view('contacts');
	
}
function changeInfoContacts(){
			$data['hoursBudni'] = $_POST['hoursBudni'];
	        $data['hoursVih'] = $_POST['hoursVih'];
	        $data['tel1'] = $_POST['tel1'];
	        $data['tel2'] = $_POST['tel2'];
	        $data['adres'] = $_POST['adres'];
	        $data['email'] = $_POST['email'];
	        $data['vk'] = $_POST['vk'];
	        $data['pin'] = $_POST['pin'];
	        $data['inst'] = $_POST['inst'];
	        $data['fb'] = $_POST['fb'];


	        $this->db->where('id', 1);
			$this->db->update('contacts', $data ); 

			echo "
				<script language='JavaScript' type='text/javascript'>
					
							<!-- 
							function GoNah(){ 
							location='".site_url('contactsadmin')."'; 
							} 
							setTimeout( 'GoNah()', 100 ); 
							//--> 
							</script>	
			";	
}

}