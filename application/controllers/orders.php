<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
	


function index(){
	$this->db->from("orders");
	$data['orders'] = $this->db->get()->result_array();
	
	$this->load->view('adminpanel/orders',$data);
	
}

function edit($id){
	$data['id'] = $id;
	$this->load->view('adminpanel/editorders',$data);
}

function transportNumber(){
	
	$data['transportNumber'] = $_POST['number'];
	

	$this->db->from("orders");
    $this->db->where('id', $_POST['HiddenID']);
    $dataZ['Orders'] = $this->db->get()->result_array();

    foreach ($dataZ['Orders'] as $newOrders): 
    	
    		$this->db->from("users");
		    $this->db->where('user_id', $newOrders['user_id']);
		    $getUserEmail['getUserEmail'] = $this->db->get()->result_array();
		    foreach ($getUserEmail['getUserEmail'] as $newgetUserEmail): 
		    		$email = $newgetUserEmail['user_email'];
		    endforeach;
    	
    endforeach;


$URL = site_url();
$to=$email;
$theme="Обновление кода отслеживания";
$text="К вашему заказу был добавлен код отслеживания.
Ваш код ".$data['transportNumber']."


Ссылка на сайт ".$URL."
";
mail ($to,$theme,$text,"Content-type:text/plain; charset=utf-8"); 




	$this->db->where('id', $_POST['HiddenID']);
	$this->db->update('orders',$data);
	
			echo "
				<script language='JavaScript' type='text/javascript'>
					
							<!-- 
							function GoNah(){ 
							location='".site_url("orders")."'; 
							} 
							setTimeout( 'GoNah()', 100 ); 
							//--> 
							</script>	
			";	
}

}