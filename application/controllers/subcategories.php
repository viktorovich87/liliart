<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategories extends CI_Controller {
	
function item(){





		$config['base_url'] = site_url().'subcategories/item'; // адрес где происходит построение навигации
		$config['total_rows'] = $this->db->count_all('subcategories'); // сколько всего записей в этой таблице, откуда будем брать записи. 
		$data['ALL'] = 		 $this->db->count_all('subcategories');													  // Используем данную функцию для подсчета всех записей.
		$config['per_page'] = 10; // сколько записей показывать на странице
		$config['full_tag_open'] = '<ul class="pagination">';  // тег открытия навигации
		$config['full_tag_close'] = '</ul>'; // тег закрытия навигации
		$config['first_link'] = '<span class="first-btn">На первую</span>';
		$config['last_link'] = '<span class="last-btn">На последнюю</span>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		

		$this->load->model('mainmodel');
	    $data['subcategories'] = $this->mainmodel->pagination($config['per_page'],$this->uri->segment(3));
	 
   		
		
		
		$this->load->view('adminpanel/subcategories' ,$data);
	



	/*$this->db->from("subcategories");
	$this->db->order_by("id", "asc"); 
	$data['subcategories'] = $this->db->get()->result_array();
	$this->load->view('adminpanel/subcategories' ,$data);*/
	
}

function addSubCategory(){

	$this->load->view('adminpanel/addsubcategory');
	
}

function edit($id){
	$data['id'] = $id;
	$this->load->view('adminpanel/editsubcategory',$data);
}
function editSubCategory()
	{

		//error_reporting(0);
		$config['upload_path'] = './uploads/menu';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name']= TRUE;
		
		$this->load->library('upload', $config);
	
		$this->upload->do_upload('FileOnload');
		$upload_data = $this->upload->data();
		 $data['img-onload'] = $upload_data['file_name'];
		

		if ($data['img-onload']=="") {
			$data['img-onload']=$_POST['hiddenFileOnload'];
		}



		$config['upload_path'] = './uploads/menu';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['encrypt_name']= TRUE;
		
		$this->load->library('upload', $config);
	
		$this->upload->do_upload('FileHover');
		$upload_data = $this->upload->data();
		 $data['img-hover'] = $upload_data['file_name'];
		

		if ($data['img-hover']=="") {
			$data['img-hover']=$_POST['hiddenFileHover'];
		}
		
		
		$data['name']=$_POST['name'];
		$data['nameEN']=$_POST['nameEN'];
		$data['category']=$_POST['category'];
		

		$this->db->where('id', $_POST['hiddenId']);
		$this->db->update('subcategories',$data);

		echo "
			<script language='JavaScript' type='text/javascript'>
				
						<!-- 
						function GoNah(){ 
						 location='".site_url("subcategories/item")."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";

	}


function addSubCategoryItem(){
	//error_reporting(0);
	header('Content-type: text/html; charset=UTF-8');
		//$data['data']=date("d.m.y H:i ");
		 $data['name']=$_POST['name'];
		 $data['nameEN']=$_POST['nameEN'];
		
		
			if($data['name']=="" ){
				echo "Заполните все поля
						<input type=\"button\"  value=\"Вернуться\" onclick=\"history.back()\">
						";die;
			}
	
		
		 $data['category'] = $_POST['category'];

		

		$this->db->insert('subcategories',$data);
	

		echo "
			<script language='JavaScript' type='text/javascript'>
				
						<!-- 
						function GoNah(){ 
						location='".site_url('subcategories/item')."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";
}


}