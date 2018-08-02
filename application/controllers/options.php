<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Options extends CI_Controller {
	
function index(){

	$this->load->view('adminpanel/options');
	$newdata = array(
               'category'  => "7897987",
               'logged_in' => TRUE
        );

	$this->session->set_userdata($newdata);
	
}
function visual(){

	$this->load->view('adminpanel/visual');
	$newdata = array(
               'category'  => "7897987",
               'logged_in' => TRUE
        );

	$this->session->set_userdata($newdata);
	
}

function changeVisual(){

		$config['upload_path'] = './uploads/preview';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name']= TRUE;
		
		$this->load->library('upload', $config);
	
	 	$this->upload->do_upload('siteBgImage');
		$upload_data = $this->upload->data();
		//echo $upload_data['file_name'];die;
		 $data['siteBgImage'] = $upload_data['file_name'];
		 if($data['siteBgImage']==""){$data['siteBgImage'] = $_POST['HidesiteBgImage'];}



		  $config['upload_path'] = './uploads/preview';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name']= TRUE;
		
		$this->load->library('upload', $config);
	
	 	$this->upload->do_upload('headerBgImage');
		$upload_data = $this->upload->data();
		 $data['headerBgImage'] = $upload_data['file_name'];
		 if($data['headerBgImage']==$data['siteBgImage']){$data['headerBgImage'] = $_POST['HideheaderBgImage'];}
		 if($data['headerBgImage']==""){$data['headerBgImage'] = $_POST['HidelineImage'];}



		   $config['upload_path'] = './uploads/preview';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name']= TRUE;
		
		$this->load->library('upload', $config);
	
	 	$this->upload->do_upload('lineImage');
		$upload_data = $this->upload->data();
		 $data['lineImage'] = $upload_data['file_name'];
		 if($data['lineImage']==$data['siteBgImage']){$data['lineImage'] = $_POST['HidelineImage'];}
		  if($data['lineImage']==$data['headerBgImage']){$data['lineImage'] = $_POST['HidelineImage'];}
		 if($data['lineImage']==""){$data['lineImage'] = $_POST['HidelineImage'];}
		 

		 
		 $config['upload_path'] = './uploads/preview';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name']= TRUE;
		
		$this->load->library('upload', $config);
	
	 	$this->upload->do_upload('logo');
		$upload_data = $this->upload->data();
		 $data['logo'] = $upload_data['file_name'];
		 if($data['logo']==$data['siteBgImage']){$data['logo'] = $_POST['Hidelogo'];}
		 if($data['logo']==$data['lineImage']){$data['logo'] = $_POST['Hidelogo'];}
		 if($data['logo']==$data['headerBgImage']){$data['logo'] = $_POST['Hidelogo'];}
		 if($data['logo']==""){$data['logo'] = $_POST['Hidelogo'];}


		  $config['upload_path'] = './uploads/preview';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name']= TRUE;
		
		$this->load->library('upload', $config);
	
	 	$this->upload->do_upload('image360');
		$upload_data = $this->upload->data();
		 $data['image360'] = $upload_data['file_name'];
		 if($data['image360']==$data['siteBgImage']){$data['image360'] = $_POST['Hideimage360'];}
		 if($data['image360']==$data['lineImage']){$data['image360'] = $_POST['Hideimage360'];}
		 if($data['image360']==$data['headerBgImage']){$data['image360'] = $_POST['Hideimage360'];}
		  if($data['image360']==$data['logo']){$data['image360'] = $_POST['Hideimage360'];}
		 if($data['image360']==""){$data['image360'] = $_POST['Hideimage360'];}
	

$data['menuColor'] = str_replace("#", "", $_POST['menuColor']);
$data['menuColor'] = "#".$data['menuColor'];

$data['lineColor'] = str_replace("#", "", $_POST['lineColor']);
$data['lineColor'] = "#".$data['lineColor'];

$data['siteBgColor'] = str_replace("#", "", $_POST['siteBgColor']);
$data['siteBgColor'] = "#".$data['siteBgColor'];

$data['secondMenuColor'] = str_replace("#", "", $_POST['secondMenuColor']);
$data['secondMenuColor'] = "#".$data['secondMenuColor'];

$data['headerBgColor'] = str_replace("#", "", $_POST['headerBgColor']);
$data['headerBgColor'] = "#".$data['headerBgColor'];




$data['productDescriptionColor'] = str_replace("#", "", $_POST['productDescriptionColor']);
$data['productDescriptionColor'] = "#".$data['productDescriptionColor'];

$data['productPriceColor'] = str_replace("#", "", $_POST['productPriceColor']);
$data['productPriceColor'] = "#".$data['productPriceColor'];

$data['menuCategoryColor'] = str_replace("#", "", $_POST['menuCategoryColor']);
$data['menuCategoryColor'] = "#".$data['menuCategoryColor'];

$data['menuSubcategoryColor'] = str_replace("#", "", $_POST['menuSubcategoryColor']);
$data['menuSubcategoryColor'] = "#".$data['menuSubcategoryColor'];




$data['priority'] =  $_POST['bg'];	
$data['priorityLine'] =  $_POST['line'];	
$data['priorityHeader'] =  $_POST['headerbg'];

$data['cartNumber'] =  $_POST['cartNumber'];		
$data['kurs'] =  $_POST['kurs'];	

		$this->db->where('id', 1);
		$this->db->update('options',$data);
		
		echo "
			<script language='JavaScript' type='text/javascript'>
				
						<!-- 
						function GoNah(){ 
						location='".$_SERVER['HTTP_REFERER']."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";	
	
}

function delLogo(){
	$data['logo']="";
	$this->db->where('id', 1);
	$this->db->update('options',$data);
	
}

}