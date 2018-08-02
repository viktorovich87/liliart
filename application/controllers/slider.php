<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider extends CI_Controller {
	


function index(){
	$this->db->from("slider");
	$this->db->order_by("priority", "asc"); 
	$data['slider'] = $this->db->get()->result_array();
	
	$this->load->view('adminpanel/slider',$data);
	
}
function addSlide(){
	$this->load->view('adminpanel/addslide');
}

function addSlideItem(){


	$this->db->from("slider");
	$this->db->select_max('priority');

    $result = $this->db->get()->result_array();

	$res = $result[0]['priority'];


		$config['upload_path'] = './uploads/slider';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name']= TRUE;
		
		$this->load->library('upload', $config);
	
	 	$this->upload->do_upload('imgSlider');
		$upload_data = $this->upload->data();
	//	echo$upload_data['file_name'];die;
		 $data['image'] = $upload_data['file_name'];
		 $data['priority' ] =  $res + 1;
		

		$this->db->insert('slider',$data);

			echo "
			<script language='JavaScript' type='text/javascript'>
				
						<!-- 
						function GoNah(){ 
						 location='".site_url("slider")."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";
}











}