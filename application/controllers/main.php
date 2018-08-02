<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	  private $user = "";
    
    public function __construct() {
        parent::__construct();
        
        // Load facebook library and pass associative array which contains appId and secret key
       // $this->load->library('fb/facebook', array('appId' => '654582261397941', 'secret' => '64a252eed8ebbb4e20e9a5fea70edc64'));
        
        // Get user's login information
        //$this->user = $this->facebook->getUser();
		
		
		define("URL_AUTH","https://www.facebook.com/dialog/oauth");
		define("CLIENT_ID","1498843220136894");
		define("SECRET","6c88d4acb71694b17ed8e0c581034c1a");
		define("REDIRECT","http://janditor.netinfo.md/main/oauth");
		define("TOKEN","https://graph.facebook.com/oauth/access_token");
		define("GET_DATA","https://graph.facebook.com/me");


    }
	
	private function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
       function next_result()
    {
        if (is_object($this->db->conn_id))
        {
          return mysqli_next_result($this->db->conn_id);
        }
    }
	
		
	function oauth() {
		
		if($_GET['code']) {
			$result = $this->get_token($_GET['code']);
			
			if($result) {
				print_r($this->get_data($result));
			}
		}
		
	}
	
		private function get_token($code) {
		$ku = curl_init();
		
		 $query = "client_id=".CLIENT_ID."&redirect_uri=".urlencode(REDIRECT)."&client_secret=".SECRET."&code=".$code;
		//die;
		curl_setopt($ku,CURLOPT_URL,TOKEN."?".$query);
		curl_setopt($ku,CURLOPT_RETURNTRANSFER,TRUE);
		
		$result = curl_exec($ku);
		if(!$result) {
			exit(curl_error($ku));
		}
		$i = json_decode($result,true);

		if($i['access_token']) {
			return $i['access_token'];
		}//die;
	
}


private function get_data($token) {
	header('Content-Type: text/html; charset=utf-8');
	$ku = curl_init();
	
	$query = "access_token=".$token;
	
	curl_setopt($ku,CURLOPT_URL,GET_DATA."?".$query);
	curl_setopt($ku,CURLOPT_RETURNTRANSFER,TRUE);
	
	$result = curl_exec($ku);
	if(!$result) {
		exit(curl_error($ku));
	}
	
	$return = json_decode($result);
	
	$objArr = (array)$return;
	//var_dump($objArr);

//	echo $objArr['name'];
	//echo $objArr['id'];
	
	$issetUser=0;
	$this->db->from("users");
	$this->db->where("fb_id",$objArr['id']);
	$getFBUser['getFBUser'] = $this->db->get()->result_array(); 
	foreach ($getFBUser['getFBUser'] as $newgetFBUser):
		$issetUser++;
	endforeach;
		
	if($issetUser==0){
			//copy("https://graph.facebook.com/".$objArr['id']."/picture?type=large", 'uploads/'.$objArr['id'].'.jpg');
			$data['user_email'] = "empty"; 
			$data['user_password'] = "empty";
			//$data['image'] = $objArr['id'].'.jpg'; 			
			$data['user_name'] = $objArr['name']; 
			$data['fb_id'] = $objArr['id'];
			$data['activateCode'] = "loggedFacebook";
			$this->db->insert('users',$data);

			$latest_id = mysql_insert_id();
			
			
			
			$newdata = array(
					   'loggedUserID'  => $latest_id,
					   'logged_in' => TRUE
				   );

				

					$this->session->set_userdata($newdata);

					echo "
								<script language='JavaScript' type='text/javascript'>
										<!-- 
										
										function GoNah(){ 
										 location='".site_url()."'; 
										} 
										setTimeout( 'GoNah()', 100 ); 
										//--> 
										</script>	
								";
	}else{
		$newdata = array(
					   'loggedUserID'  => $newgetFBUser['user_id'],
					   'logged_in' => TRUE
				   );

				

					$this->session->set_userdata($newdata);

 
					echo "
								<script language='JavaScript' type='text/javascript'>
										<!-- 
										
										function GoNah(){ 
										 location='".site_url()."'; 
										} 
										setTimeout( 'GoNah()', 100 ); 
										//--> 
										</script>	
								";
	}
	
}



function register()
	{
	

			error_reporting(0);
	
			$data['user_name'] = $_POST['name']; 
			$data['user_email'] = $_POST['email']; 
			$data['user_password'] = $_POST['pass']; 
			$data['user_gender'] = $_POST['gender']; 
			$spass = $_POST['spass']; 
			
if ($data['user_password']!=$spass) {
	exit("Ваши пароли не совпадают");
}



		
			
			
			$this->db->insert('users',$data);
			$latest_id = mysql_insert_id();
			$newdata = array(
	               'loggedUserID'  => $latest_id,
	               'logged_in' => TRUE
	        );

			$this->session->set_userdata($newdata);

			echo "
				<script language='JavaScript' type='text/javascript'>
					
							<!-- 
							function GoNah(){ 
							location='".site_url()."'; 
							} 
							setTimeout( 'GoNah()', 100 ); 
							//--> 
							</script>	
			";			
	}

	function enterCab(){
		$this->load->database();
		$data = array();
		
		$email=$_POST['email'];
		$pass=$_POST['password']; 

		$i=0;

		$this->db->from("users");
		$this->db->where("user_email",$email);
		$this->db->where("user_password",$pass);
		$data['enter'] = $this->db->get()->result_array();

		foreach ($data['enter'] as $newenter):
			if($newenter['user_email']){
				$i=1;
			}
		endforeach;

		if($i==1){




				if($newenter['user_password']==$pass){
					$newdata = array(
                   'loggedUserID'  => $newenter['user_id'],
                   'logged_in' => TRUE
               );

					$this->session->set_userdata($newdata);
					
			//echo $loggedUserID = $this->session->userdata('loggedUserID');die;
 
					/*echo "
								<script language='JavaScript' type='text/javascript'>
										<!-- 
										
										function GoNah(){ 
										 location='".site_url()."'; 
										} 
										setTimeout( 'GoNah()', 100 ); 
										//--> 
										</script>	
								";*/
								echo "login";
				}else{
					//redirect( base_url());
					echo "error";
					}
							}else{
								//redirect( base_url());
								echo "error";
								}
		/****************************************/
}


function lang_en()
  {
         $lang = array(
                   'language'  => 'en'
               );
          $this->session->set_userdata($lang);
          
  }
function myPage(){
	$this->load->view('myCab/myPage');
}
function myOptions(){
	$this->load->view('myCab/myOptions');
}

  function lang_ru()
  {
         $lang = array(
                   'language'  => 'ru'
               );
          $this->session->set_userdata($lang);
          
  }
	 function index()
	{	
		$newdata = array(
               'category'  => "7897987",
			   'active_menu'  => "home",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);

		
		$this->load->view('main');
	}

	function myOrders(){
		$newdata = array(
               'category'  => "7897987",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
		$this->load->view('myorders');
	}
	
		
		
/*function myOptions(){
		$newdata = array(
               'category'  => "7897987",
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
		$this->load->view('myoptions');
	}*/


function account_password(){
	$this->load->view('account_password');
}

function account_password_new(){

	$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max=10; 
        $size=StrLen($chars)-1; 
        $newpassword=null; 
                                               
        while($max--) {
              $newpassword.=$chars[rand(0,$size)]; 
        }

	$data['email'] = $_POST['email'];
	$title = 'Востановления пароля для сайта Janditor';
    $letter = 'Вы запросили восстановление пароля для аккаунта. Ваш новый пароль: '.$newpassword;


    $this->db->where('user_email', $data['email']);
	$this->db->update('users', array('user_password' => $newpassword) ); 

// Отправляем письмо
    mail($data['email'] , $title, $letter);

	$this->load->view('account_password_new', $data);
}

/*	function captcha_creator()
	{
		$this->load->helper('html');
		$this->load->helper('text');
		$this->load->helper('string');
		$this->load->helper('captcha');

		$string = random_string('alpha_dash', 7);

		$vals = array(
		    'word'	=> $string,
		    'img_path'	=> './resources/img/captcha/',
		    'img_url'	=> base_url().'resources/img/captcha/',
		    'font_path'	=> './system/fonts/texb.ttf',
		    'img_width'	=> 180,
		    'img_height' => 30,
		    'expiration' => 10
	    );

		$cap = create_captcha($vals);
		echo $cap['image'];
	}*/




	function exitt(){
		//$this->load->view('exit');
$this->session->sess_destroy();
		echo "
				<script language='JavaScript' type='text/javascript'>
						<!-- 
						function GoNah(){ 
						 location='".site_url()."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
				";
	}
	
function searchProduct(){

	if (!empty($_POST['find']))
	{
		$this->db->from("products");
		$this->db->like("name", $_POST['find']); 
		$this->db->or_like("description", $_POST['find']);
		$this->db->order_by("id", "asc"); 

		$data['products'] = $this->db->get()->result_array();
//var_dump($data);

		if(!empty($data['products']))
		{
			{$this->load->view('search' ,$data);}
		}
		else {$this->load->view('search_nothing');}
	}
	else 
		{$this->load->view('search_nothing');}
	
	
	
	}

function sbmt()
  {
    $isset = 0;

if( !empty($_POST['NAME']) and !empty($_POST['EMAIL']))
{
	$this->db->from("users");
    //$this->db->where("user_name",$_POST['NAME']);
    $this->db->where("user_email",$_POST['EMAIL']);
      $userData['user'] = $this->db->get()->result_array();
      
      foreach ($userData['user'] as $user):
          $isset++;
      endforeach;
}
    

      if ( empty($_POST['NAME']) )
        { echo "Вы не ввели данные в поле ФИО"; }
      else{
            if ( empty($_POST['EMAIL']) )
             { echo "Вы не ввели свой email адрес"; }
            else{
            	  if(!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $_POST['EMAIL'])){
            		echo "Не корректный почтовый адрес"; 
		            	}else{
			            	if ( $isset > 0 )
			            		{echo "Данный пользователь уже существует";}
					 				else{
						 					if ( empty($_POST['PASS']) )
						                  { echo "Вы не ввели пароль"; }
						                  else{
						                       if ( $_POST['PASS'] != $_POST['PASS2'] ) 
						                       { echo "Пароли не совпадают"; }
						                        else{
						                             if ( $_POST['CAPTCHA'] != $_POST['HIDDENCAPTCHA'] ) 
						                             { echo "Вы ввели неверный код"; }
						                             else {echo "Верно";}
						                            }
						                      }
				 						}
	 				}
                }
          }

}
//----------------------------------------------------E_MAIL
function chngeEmail()
  {
    $isset = 0;

	$this->db->from("users");
    $this->db->where("user_email",$_POST['NEWEMAIL']);
      $userData['user'] = $this->db->get()->result_array();
      
      foreach ($userData['user'] as $user):
          $isset++;
      endforeach;

            	if ( $isset > 0 )
            		{echo "Данный email занят";}
	            else {
	            		if ( $_POST['PASS'] != $_POST['HIDDENPASS'] )
	            		{ echo "Введен неверный пароль"; }
		            	else 
		            	{echo "Верно";} 
	            		
	            	}                        
}

function changeUserEmail()
  {
			error_reporting(0);

			$this->db->where('user_id', $_POST['hiddenId']);
			$this->db->update('users', array('user_email' => $_POST['newEmail']) ); 


			echo "
				<script language='JavaScript' type='text/javascript'>
					
							<!-- 
							function GoNah(){ 
							location='".site_url()."'; 
							} 
							setTimeout( 'GoNah()', 100 ); 
							//--> 
							</script>	
			";	
  }
//----------------------------------------------------PASSWORD
function chngePass()
  {

            	if ( $_POST['NEWPASS'] != $_POST['NEWPASS2'])
            		{echo "Пароли не совпадают";}
	            else 
	            	{echo "Верно";}                        
  }

function changeUserPass()
  {
  			error_reporting(0);

    $data['email'] = $_POST['email'];
	$title = 'Сменя пароля для сайта Janditor';
    $letter = 'Ваш пароль для аккаунта был изменён. Ваш новый пароль: '.$_POST['newPass'];
// Отправляем письмо
    mail($data['email'] , $title, $letter);

			$this->db->where('user_id', $_POST['hiddenId']);
			$this->db->update('users', array('user_password' => $_POST['newPass']) ); 


			echo "
				<script language='JavaScript' type='text/javascript'>
					
							<!-- 
							function GoNah(){ 
							location='".site_url()."'; 
							} 
							setTimeout( 'GoNah()', 100 ); 
							//--> 
							</script>	
			";	
  }
//----------------------------------------------------
	function userRegister(){
			error_reporting(0);

			$arr = array('a','b','c','d','e','f',  
                 'g','h','i','j','k','l',  
                 'm','n','o','p','r','s',  
                 't','u','v','x','y','z',  
                 'A','B','C','D','E','F',  
                 'G','H','I','J','K','L',  
                 'M','N','O','P','R','S',  
                 'T','U','V','X','Y','Z',  
                 '1','2','3','4','5','6',  
                 '7','8','9','0');  
    // Генерируем пароль  
    $gen_password = "";  
    for($i = 0; $i < 25; $i++)  
    {  
      // Вычисляем случайный индекс массива  
      $index = rand(0, count($arr) - 1);  
      $gen_password .= $arr[$index];  
    } 



			$data['user_name'] = $_POST['name']; 
			$data['user_email'] = $_POST['email']; 
			$data['user_password'] = $_POST['pass']; 
			$data['activateCode'] = $gen_password; 
			
			$this->db->insert('users',$data);

		/*	$latest_id = mysql_insert_id();

			$newdata = array(
	               'loggedUserID'  => $latest_id,
	               'logged_in' => TRUE
	        );

			$this->session->set_userdata($newdata);*/
$URL = site_url();
$to=$_POST['email'];
$theme="Регистрация на сайте";
$text="Вы были зарегистрированы на сайте Jan Ditor
Ссылка на сайта ".$URL."
Ваш логин: ".$data['user_email']."
Данные входа, которые вы вписали при регистрации!

Ваш аккаунт пока не активный.
Пожалуйста, пройдите по этой ссылке и введите код активации.
Код активации: ".$gen_password."
Ссылка для активации аккаунта ".$URL."/activation
";
$headers = "From: Jan Ditor" . "\r\n" ;
mail ($to,$theme,$text, $headers); 


			echo "
				<script language='JavaScript' type='text/javascript'>
					alert('На вашу почту было отправлено письмо с кодом для активации вашего аккаунта');
							<!-- 
							function GoNah(){ 
							location='".site_url()."'; 
							} 
							setTimeout( 'GoNah()', 100 ); 
							//--> 
							</script>	
			";			
	}
function activation(){

		$this->db->from("users");
		$this->db->where("activateCode",$_POST['activation']);
		$data['enter'] = $this->db->get()->result_array();
		foreach ($data['enter'] as $newenter):
			$ID = $newenter['user_id'];


			$activate['activateCode']="";
			$activate['activate']=1;
			$this->db->where('user_id', $ID);
			$this->db->update('users',$activate);
		endforeach;


				$newdata = array(
                   'loggedUserID'  => $ID,
                   'logged_in' => TRUE
               );

					$this->session->set_userdata($newdata);
					echo "
								<script language='JavaScript' type='text/javascript'>
										<!-- 
										function GoNah(){ 
										 location='".site_url()."'; 
										} 
										setTimeout( 'GoNah()', 100 ); 
										//--> 
										</script>	
								";

}

	 function category($id)
	{

		$newdata = array(
               'category'  => $id,
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
		$data['id'] = $id; 
		$this->load->view('category',$data);
	}

	 function subcategory($id)
	{


		$this->load->helper('html');
		$this->load->helper('text');
		$this->load->helper('string');
		$this->load->helper('captcha');

		 $string = random_string('alpha_dash', 7);

		$vals = array(
		    'word'	=> $string,
		    'img_path'	=> 'resources/img/captcha/',
		    'img_url'	=> '../../resources/img/captcha/',
		    'font_path'	=> 'system/fonts/texb.ttf',
		    'img_width'	=> 180,
		    'img_height' => 35,
		    'expiration' => 10
	    );

		$data = create_captcha($vals);
		//echo $data['image'];
		//$data['string'] = $string;
		//$cap['string'] = $string;
		

		$newdata = array(
               'subcategory'  => $id,
               'logged_in' => TRUE
        );

		$this->session->set_userdata($newdata);
		$data['id'] = $id; 
		$this->load->view('subcategory',$data);
	}

		function delMyOrder(){
			$this->db->from("orders");
		    $this->db->where('id', $_POST['id']);
		    $getUserOrderId['getUserOrderId'] = $this->db->get()->result_array();
		    foreach ($getUserOrderId['getUserOrderId'] as $newgetUserOrderId): 
		    		$UserOrderId = $newgetUserOrderId['user_id'];
		    endforeach;


		     $loggedUserID = $this->session->userdata('loggedUserID'); 

		     if ($UserOrderId == $loggedUserID) {
		     	$this->db->where('id',$_POST['id']);
				$this->db->delete('orders');	
		     }

		}

		function getAllOrder(){
		
		 $sessionID = $this->session->userdata('sessionID');
	
				$SUMM_PRICE =0;
				$COUNT =0;
				$this->db->from("cart");
				$this->db->where("sessionID",$sessionID);
				$getCartProducts['getCartProducts'] = $this->db->get()->result_array();
				foreach ($getCartProducts['getCartProducts'] as $newgetCartProducts):
					$SUMM_PRICE = $newgetCartProducts['price'] * $newgetCartProducts['count'] + $SUMM_PRICE;
				endforeach;
				
			 echo $SUMM_PRICE;
			
	}

	function delCartLine(){
	$this->db->where('id',$_POST['orderID']);
   	$this->db->delete('cart'); 
	
	 ?>
			<?php $sessionID = $this->session->userdata('sessionID');
	
				$SUMM_PRICE =0;
				$COUNT =0;
				$this->db->from("cart");
				$this->db->where("sessionID",$sessionID);
				$getCartProducts['getCartProducts'] = $this->db->get()->result_array();
				foreach ($getCartProducts['getCartProducts'] as $newgetCartProducts):
					$SUMM_PRICE = $newgetCartProducts['price']*$newgetCartProducts['count'] + $SUMM_PRICE;	
					$COUNT++;
				endforeach;
				
			?>
			<?php echo $SUMM_PRICE;?>
	 <?php
	 
	 
	}
function changeNumber(){

	
		$data['count']=$_POST['NUMBER'];
		$this->db->where('id', $_POST['ID']);
		$this->db->update('cart',$data);
	
	 ?>
			<?php $sessionID = $this->session->userdata('sessionID');
	
				$SUMM_PRICE =0;
				$COUNT =0;
				$this->db->from("cart");
				$this->db->where("sessionID",$sessionID);
				$this->db->where('id', $_POST['ID']);
				$getCartProducts['getCartProducts'] = $this->db->get()->result_array();
				foreach ($getCartProducts['getCartProducts'] as $newgetCartProducts):
					$SUMM_PRICE = $newgetCartProducts['price'] ;
				endforeach;
				
			?>
			<?php echo $SUMM_PRICE*$newgetCartProducts['count'];?>
	 <?php
	 
	 
	}
		function addtocart(){
			$sessionID = $this->session->userdata('sessionID');
			$cart['tovarid'] = $_POST['PROD_ID'];
			$cart['count'] = 1;
			$cart['price'] = $_POST['PRICE'];
			$cart['sessionID'] = $sessionID;
			$this->db->insert('cart',$cart);
			
			$SUMM_PRICE =0;
			$COUNT =0;
			$this->db->from("cart");
			$this->db->where("sessionID",$sessionID);
			$getCartProducts['getCartProducts'] = $this->db->get()->result_array();
			foreach ($getCartProducts['getCartProducts'] as $newgetCartProducts):
			 	$SUMM_PRICE = $newgetCartProducts['price']*$newgetCartProducts['count'] + $SUMM_PRICE;	
				$COUNT++;
			endforeach;
			?>
	  
		  <a href="<?php echo site_url();?>checkout">
					<h3><?php echo $SUMM_PRICE;?> лей. (<span  class=""><?php echo $COUNT;?> шт.</span> )
					<img src="<?php echo site_url();?>resources/images/bag.png" alt=""></h3>
				</a>	
			
				<div class="clearfix"> </div>
			<?php
		}
	function delItemInToCart(){
		$sessionID = $this->session->userdata('sessionID');
		$this->db->where('sessionID',$sessionID);
		$this->db->where('tovarid',$_POST['TOVAR_ID']);
		$this->db->delete('cart');
		
		$sessionID = $this->session->userdata('sessionID');
			
			$SUMM_PRICE =0;
			$COUNT =0;
			$this->db->from("cart");
			$this->db->where("sessionID",$sessionID);
			$getCartProducts['getCartProducts'] = $this->db->get()->result_array();
			foreach ($getCartProducts['getCartProducts'] as $newgetCartProducts):
			 	$SUMM_PRICE = $newgetCartProducts['price']*$newgetCartProducts['count'] + $SUMM_PRICE;	
				$COUNT++;
			endforeach;
			?>
	  
		  <a href="<?php echo site_url();?>checkout">
					<h3><?php echo $SUMM_PRICE;?> лей. (<span  class=""><?php echo $COUNT;?> шт.</span> )
					<img src="<?php echo site_url();?>resources/images/bag.png" alt=""></h3>
				</a>	
			
				<div class="clearfix"> </div>
			<?php
	}
		function getOrder(){
/* OLD functionality for record order
		header('Content-Type: text/html; charset=utf-8');


		$data['user_id'] =  $_POST['user_id'];
		$data['product_id'] =   $_POST['product_id'];
		$data['price'] =   $_POST['price'];
		$data['yourName'] =   $_POST['yourName'];
		$data['yourPhone'] =   $_POST['yourPhone'];
		$data['yourEmail'] =   $_POST['yourEmail'];
		$data['yourAdres'] =   $_POST['yourAdres'];
		$data['yourPochta'] =   $_POST['yourPochta'];
		$data['yourNote'] =   $_POST['yourNote'];
		$data['oplata'] =   $_POST['oplata'];
		$data['transportNumber'] =   "";
		$data['status'] =   "Open";

		$data['date'] =   date("Y-m-d G:i:s");



		$this->db->from("users");
	    $this->db->where('user_id', $_POST['user_id']);
	    $getUserEmail['getUserEmail'] = $this->db->get()->result_array();
	    foreach ($getUserEmail['getUserEmail'] as $newgetUserEmail): 
	    		$user_email = $newgetUserEmail['user_email'];
	    endforeach;

	    $this->db->from("users");
	    $this->db->where('user_status', 'admin');
	    $getAdminEmail['getAdminEmail'] = $this->db->get()->result_array();
	    foreach ($getAdminEmail['getAdminEmail'] as $newgetAdminEmail): 
	    		$admin_email = $newgetAdminEmail['user_email'];
	    endforeach;

	    $this->db->from("products");
	    $this->db->where('id', $_POST['product_id']);
	    $getProductsInfo['getProductsInfo'] = $this->db->get()->result_array();
	    foreach ($getProductsInfo['getProductsInfo'] as $newgetProductsInfo): 
	    		$product_name = $newgetProductsInfo['name'];
	    		$product_price = $newgetProductsInfo['price'];
	    endforeach;


$URL = site_url();
$to=$user_email;
$theme="Оформление заказа";
$text="Вы сделали заказ на сайте Jan Ditor.
Наименование товара: ".$product_name."
Цена: ".$product_price."


Ссылка на сайт ".$URL."
";
mail ($to,$theme,$text,"Content-type:text/plain; charset=utf-8"); 


$URL = site_url();
$to=$admin_email;
$theme="Заказ на сайте";
$text="Был сделан заказ на сайте Jan Ditor.
Наименование товара: ".$product_name."
Цена: ".$product_price."


Ссылка на сайт ".$URL."
";
mail ($to,$theme,$text,"Content-type:text/plain; charset=utf-8"); 




		$this->db->insert('orders',$data);

	echo "
								<script language='JavaScript' type='text/javascript'>
								alert(\"Ваш заказ был принят\");
										<!-- 
										
										function GoNah(){ 
										  location='".$_SERVER['HTTP_REFERER']."'; 
										} 
										setTimeout( 'GoNah()', 100 ); 
										//--> 
										</script>	
								";


end OLD functionality for record order
*/


		$sessionID = $this->session->userdata('sessionID');
		$tovarid = $_POST['tovarid'];
		$number = $_POST['number'];
		//$price = $_POST['price'];
		
		//var_dump($price);die;
		$check=0;
		foreach ($tovarid as $key => $id) {
			$data['product_id'] = $id;
			//$data['session_id'] = $sessionID;
			$data['count'] = $number[$check];
			
					$this->db->from("products");
					$this->db->where("id",$id);
					$GetPrice['GetPrice'] = $this->db->get()->result_array();
					
					foreach ($GetPrice['GetPrice'] as $newGetPrice):
						$PRICE = $newGetPrice['price'];
						//$CODE = $newGetPrice['code'];
					endforeach;
					
					
					$buybutton['buybutton']="order";
					$this->db->where('id', $id);
					$this->db->update('products',$buybutton);
			
			
			$data['price'] = $PRICE;
			$data['user_id'] =  $_POST['user_id'];
			$data['yourName'] = $_POST['yourName'];
			$data['yourEmail'] = $_POST['yourEmail'];
			$data['yourAdres'] = $_POST['yourAdres'];
			$data['yourPochta'] = $_POST['yourPochta'];
			$data['yourPhone'] = $_POST['yourPhone'];
			$data['yourNote'] = $_POST['yourNote'];
			$data['oplata'] = $_POST['oplata'];
			//$data['url'] = $_POST['codeorurl'];
			//$data['code'] = $CODE;
			$data['date'] = date("Y-m-d G:i:s");
			$data['transportNumber'] =   "";
			$data['status'] =   "Open";

			$this->db->insert('orders',$data);
			
			$check++;
		}



		$this->db->from("users");
	    $this->db->where('user_id', $_POST['user_id']);
	    $getUserEmail['getUserEmail'] = $this->db->get()->result_array();
	    foreach ($getUserEmail['getUserEmail'] as $newgetUserEmail): 
	    		$user_email = $newgetUserEmail['user_email'];
	    endforeach;

	    $this->db->from("users");
	    $this->db->where('user_status', 'admin');
	    $getAdminEmail['getAdminEmail'] = $this->db->get()->result_array();
	    foreach ($getAdminEmail['getAdminEmail'] as $newgetAdminEmail): 
	    		$admin_email = $newgetAdminEmail['user_email'];
	    endforeach;



$URL = site_url();
$to=$user_email;
$theme="Оформление заказа";
$text="Вы сделали заказ на сайте Jan Ditor.
Подробности смотрите в своём личном кабинете на сайте.

Ссылка на сайт ".$URL."
";
$headers = "From: Jan Ditor" . "\r\n" ;
mail ($to,$theme,$text, $headers); 



$URL = site_url();
$to=$admin_email;
$theme="Заказ на сайте";
$text="Был сделан заказ на сайте Jan Ditor.

Ссылка на сайт ".$URL."
";
$headers = "From: Jan Ditor" . "\r\n" ;
mail ($to,$theme,$text, $headers); 



		
		$this->db->where('sessionID',$sessionID);
		$this->db->delete('cart'); 
		echo "
			<script language='JavaScript' type='text/javascript'>
				alert(\"Thank you!\"); 
						<!-- 
						function GoNah(){ 
						location='".$_SERVER['HTTP_REFERER']."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";
		
		
	

	}
	
	
}

