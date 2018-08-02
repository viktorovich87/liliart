<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
	
function index(){
	$this->db->from("categories");
	$this->db->order_by("priority", "asc"); 
	$data['categories'] = $this->db->get()->result_array();
	$this->load->view('adminpanel/categories' ,$data);
	
}

function addCategory(){

	$this->load->view('adminpanel/addcategory');
	
}

function edit($id){
	$data['id'] = $id;
	$this->load->view('adminpanel/editcategory',$data);
}


function editCategory()
	{

		
		$data['name']=$_POST['name'];
		$data['nameEN']=$_POST['nameEN'];
		

		$this->db->where('id', $_POST['hiddenId']);
		$this->db->update('categories',$data);

error_reporting(0);

	
		echo "
			<script language='JavaScript' type='text/javascript'>
				
						<!-- 
						function GoNah(){ 
						 location='".site_url("categories")."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";

	}

function addCategoryItem(){

	$this->db->from("categories");
	$this->db->select_max('priority');

    $result = $this->db->get()->result_array();

	$res = $result[0]['priority'];


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

		 $data['priority' ] =  $res + 1;

		

		$this->db->insert('categories',$data);







		 $latest_id = mysql_insert_id();
	
			
			// создание папки и складывания туда изображени для вывода в 360 градусов



	

		echo "
			<script language='JavaScript' type='text/javascript'>
				
						<!-- 
						function GoNah(){ 
						location='".site_url('categories')."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";
}


}