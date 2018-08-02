<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
function index(){
	$this->load->view('adminpanel/adminpanel');
}
	
function account_password(){
	$this->load->view('adminpanel/account_password');
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

	$this->load->view('adminpanel/account_password_new', $data);
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

function addSupportText()
  {
  		header('Content-Type: text/html; charset=utf-8');
			 $data['text'] = $_POST['text'];
			 $data['textEN'] = $_POST['textEN'];

			$this->db->where('id', 1);
			$this->db->update('support', $data); 


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


function addDeliveryText()
  {
  			header('Content-Type: text/html; charset=utf-8');
			$data['text'] = $_POST['text'];
			$data['textEN'] = $_POST['textEN'];

			$this->db->where('id', 1);
			$this->db->update('delivery', $data); 


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
  
  function addPrebuyText()
  {
  			header('Content-Type: text/html; charset=utf-8');
			$data['text'] = $_POST['text'];
			$data['textEN'] = $_POST['textEN'];

			$this->db->where('id', 1);
			$this->db->update('prebuy', $data); 


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
  
  function addIurInfo()
  {
  		header('Content-Type: text/html; charset=utf-8');
			 $data['text'] = $_POST['text'];
			 $data['textEN'] = $_POST['textEN'];

			$this->db->where('id', 1);
			$this->db->update('iurinfo', $data); 


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
  
function changeAdminEmail()
  {
			error_reporting(0);

			$this->db->where('user_id', $_POST['hiddenId']);
			$this->db->update('users', array('user_email' => $_POST['newEmail']) ); 


			echo "
				<script language='JavaScript' type='text/javascript'>
					
							<!-- 
							function GoNah(){ 
							location='".site_url()."admin/controlpanel'; 
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

function changeAdminPass()
  {
  			error_reporting(0);

			$this->db->where('user_id', $_POST['hiddenId']);
			$this->db->update('users', array('user_password' => $_POST['newPass']) ); 


			echo "
				<script language='JavaScript' type='text/javascript'>
					
							<!-- 
							function GoNah(){ 
							location='".site_url()."admin/controlpanel'; 
							} 
							setTimeout( 'GoNah()', 100 ); 
							//--> 
							</script>	
			";	
  }
//----------------------------------------------------
function subcategoryName(){
		error_reporting(0);
	
		/*$this->db->from("news");
		$this->db->where("id", $_POST['ID']); 
		$data['news'] = $this->db->get()->result_array();*/

		$this->db->from("subcategories");
		//$this->db->where("name", $_POST['subcategoryName']); 
		$data['subcategories'] = $this->db->get()->result_array();
		//echo $_POST['subcategoryName'];
		$ISSSET_NEWS=0;

		foreach ($data['subcategories'] as $newcategories):


			//$string = 'Hello World!';
			  if(stristr($newcategories['name'], $_POST['subcategoryName']) === FALSE) {
			   
			  }else{
			  	$ISSSET_NEWS++;
			?>
			
<tr id="news<?php echo $newcategories['id'];?>" style="background:none;">

	<td><?php echo $newcategories['id'];?></td>

	<td><?php echo $newcategories['name'];?></td>
	<td><?php 

		$this->db->from("categories");
		$this->db->where("id",$newcategories['category']);
        $getCatName['getCatName'] = $this->db->get()->result_array();

        foreach ($getCatName['getCatName'] as $newgetCatName): 
			echo $newgetCatName['name'];
		 endforeach;  ?></td>
	<td> 
		<img style="max-width:50px;" src="<?php echo site_url();?>uploads/menu/<?php echo $newcategories['img-onload'];?>">
	</td>



<td>
	<img  style="max-width:50px;" src="<?php echo site_url();?>uploads/menu/<?php echo $newcategories['img-hover'];?>">
</td>

	<td>
		<a href="<?php echo site_url();?>subcategories/edit/<?php echo $newcategories['id'];?>" title="Редактировать" aria-label="Редактировать" data-pjax="0">

			<span class="glyphicon glyphicon-pencil"></span>

		</a> 

		<span onclick="delSubcategories('<?php echo $newcategories['id'];?>','<?php echo site_url();?>')" title="Удалить" style="cursor:pointer;">

			<span class="glyphicon glyphicon-trash"></span>

		</span>

	</td>

</tr>
			<?php
			  }



		
		endforeach;
		//if($ISSSET_NEWS==0){echo "нет совпадений... =(";}
	}




	function subcategoryParentName(){
		error_reporting(0);
	
		$this->db->from("categories");
		//$this->db->where("name", $_POST['subcategoryParentName']); 
		$getParentId['getParentId'] = $this->db->get()->result_array();
		foreach ($getParentId['getParentId'] as $newgetParentId):
			$PArID = $newgetParentId['id'];

//$string = 'Hello World!';
			  if(stristr($newgetParentId['name'], $_POST['subcategoryParentName']) === FALSE) {
			   
			  }else{

		$this->db->from("subcategories");
		$this->db->where("category", $PArID ); 
		$data['subcategories'] = $this->db->get()->result_array();
		echo $_POST['subcategoryName'];
		$ISSSET_NEWS=0;

		foreach ($data['subcategories'] as $newcategories):


			
			  	$ISSSET_NEWS++;
			?>
			
<tr id="news<?php echo $newcategories['id'];?>" style="background:none;">

	<td><?php echo $newcategories['id'];?></td>

	<td><?php echo $newcategories['name'];?></td>
	<td><?php 

											$this->db->from("categories");
											$this->db->where("id",$newcategories['category']);
									        $getCatName['getCatName'] = $this->db->get()->result_array();

									        foreach ($getCatName['getCatName'] as $newgetCatName): 
												echo $newgetCatName['name'];
											 endforeach;  ?></td>
	<td> 
		<img style="max-width:50px;" src="<?php echo site_url();?>uploads/menu/<?php echo $newcategories['img-onload'];?>">
	</td>



<td>
	<img  style="max-width:50px;" src="<?php echo site_url();?>uploads/menu/<?php echo $newcategories['img-hover'];?>">
</td>

	<td>
		<a href="<?php echo site_url();?>subcategories/edit/<?php echo $newcategories['id'];?>" title="Редактировать" aria-label="Редактировать" data-pjax="0">

			<span class="glyphicon glyphicon-pencil"></span>

		</a> 

		<span onclick="delSubcategories('<?php echo $newcategories['id'];?>','<?php echo site_url();?>')" title="Удалить" style="cursor:pointer;">

			<span class="glyphicon glyphicon-trash"></span>

		</span>

	</td>

</tr>
			<?php
			 


		
				endforeach;

		 }

		endforeach;

		
		
	}


function delSubcategories($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('subcategories');	
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


function delImageProduct($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('imagesproducts');	
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


function delCategoryImage($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('imagescategory');	
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



	function delImageSlider($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('slider');	
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


function delOrder($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('orders');	
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

	function delCategory($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('categories');	
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


	function delProduct($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('products');	


		$this->db->where('product_id',$id);
		$this->db->delete('imagesproducts');	

		$this->db->where('product_id',$id);
		$this->db->delete('orders');

		echo "
			<script language='JavaScript' type='text/javascript'>
			
						<!-- 
						function GoNah(){ 
						 location='".site_url("products")."'; 
						} 
						setTimeout( 'GoNah()', 100 ); 
						//--> 
						</script>	
		";
	}

	
function enter()
	{




		
		$this->load->database();
		$data = array();
		
		$login=$_POST['login'];
		$pass=$_POST['pass'];

		$i=0;

		$this->db->from("users");
		$this->db->where("user_email",$login);
		$data['admin'] = $this->db->get()->result_array();

		foreach ($data['admin'] as $newusers):
			if($newusers['user_email']){
				$i=1;
			}
		endforeach;

		


		$this->db->from("users");
		$this->db->where("user_password",$pass);
		$data['pass'] = $this->db->get()->result_array();

		foreach ($data['pass'] as $newusers):
			if($newusers['user_password']){
				$i=1;
			}
		endforeach;
		

		if($i==1){
				if($newusers['user_password']==$pass){
					$newdata = array(
                   'username'  => $newusers['user_id'],
                   'logged_in' => TRUE
               );

					$this->session->set_userdata($newdata);
					
			$session_id = $this->session->userdata('username');
 
					echo "
								<script language='JavaScript' type='text/javascript'>
										<!-- 
										function GoNah(){ 
										 location='".site_url("admin/controlpanel/")."'; 
										} 
										setTimeout( 'GoNah()', 100 ); 
										//--> 
										</script>	
								";
				}else{redirect( base_url());}
							}else{redirect( base_url());}
		/****************************************/
		

	}


	function controlpanel(){
		$this->load->view('adminpanel/controlpanel');
	}


	function categoryup($ID){

		$this->db->from("categories");
		$this->db->where("id", $ID); 
		$data['seasons'] = $this->db->get()->result_array();
			foreach ($data['seasons'] as $newseasons):

				 $THIS_LEAGUE_PRIORITY = $newseasons['priority'];

			endforeach;
			$findLeague=0;
			$nextLeaguePriority=0;
			for($i=$THIS_LEAGUE_PRIORITY;$i>=0;$i--){
					$nextPR = $i-1;
					$this->db->from("categories");
					$this->db->where("priority", $nextPR); 
					$data['seasons'] = $this->db->get()->result_array();
						foreach ($data['seasons'] as $newseasons):
							$nextLeaguePriority = $newseasons['priority'];
							$nextLeagueId = $newseasons['id'];
							$findLeague++;

						endforeach;
						if($findLeague!=0){break;}
			}
			$THIS_LEAGUE['priority'] = $nextLeaguePriority;
			$this->db->where('id', $ID);
			$this->db->update('categories',$THIS_LEAGUE);
			
			
			$UP_LEAGUE['priority'] = $THIS_LEAGUE_PRIORITY;
			$this->db->where('id', $nextLeagueId);
			$this->db->update('categories',$UP_LEAGUE);
			
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


	function categorydown($ID){

		$this->db->from("categories");
		$this->db->where("id", $ID); 
		$data['seasons'] = $this->db->get()->result_array();
			foreach ($data['seasons'] as $newseasons):

				 $THIS_LEAGUE_PRIORITY = $newseasons['priority'];

			endforeach;
			$findLeague=0;
			$nextLeaguePriority=0;
			for($i=$THIS_LEAGUE_PRIORITY;$i<=999999;$i++){
					$nextPR = $i+1;
					$this->db->from("categories");
					$this->db->where("priority", $nextPR); 
					$data['seasons'] = $this->db->get()->result_array();
						foreach ($data['seasons'] as $newseasons):
							$nextLeaguePriority = $newseasons['priority'];
							$nextLeagueId = $newseasons['id'];
							$findLeague++;

						endforeach;
						if($findLeague!=0){break;}
			}
			$THIS_LEAGUE['priority'] = $nextLeaguePriority;
			$this->db->where('id', $ID);
			$this->db->update('categories',$THIS_LEAGUE);
			
			
			$UP_LEAGUE['priority'] = $THIS_LEAGUE_PRIORITY;
			$this->db->where('id', $nextLeagueId);
			$this->db->update('categories',$UP_LEAGUE);
			
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




/*BEGIN arrows slider*/
function sliderup($ID){

		$this->db->from("slider");
		$this->db->where("id", $ID); 
		$data['seasons'] = $this->db->get()->result_array();
			foreach ($data['seasons'] as $newseasons):

				 $THIS_LEAGUE_PRIORITY = $newseasons['priority'];

			endforeach;
			$findLeague=0;
			$nextLeaguePriority=0;
			for($i=$THIS_LEAGUE_PRIORITY;$i>=0;$i--){
					$nextPR = $i-1;
					$this->db->from("slider");
					$this->db->where("priority", $nextPR); 
					$data['seasons'] = $this->db->get()->result_array();
						foreach ($data['seasons'] as $newseasons):
							$nextLeaguePriority = $newseasons['priority'];
							$nextLeagueId = $newseasons['id'];
							$findLeague++;

						endforeach;
						if($findLeague!=0){break;}
			}
			$THIS_LEAGUE['priority'] = $nextLeaguePriority;
			$this->db->where('id', $ID);
			$this->db->update('slider',$THIS_LEAGUE);
			
			
			$UP_LEAGUE['priority'] = $THIS_LEAGUE_PRIORITY;
			$this->db->where('id', $nextLeagueId);
			$this->db->update('slider',$UP_LEAGUE);
			
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


	function sliderdown($ID){

		$this->db->from("slider");
		$this->db->where("id", $ID); 
		$data['seasons'] = $this->db->get()->result_array();
			foreach ($data['seasons'] as $newseasons):

				 $THIS_LEAGUE_PRIORITY = $newseasons['priority'];

			endforeach;
			$findLeague=0;
			$nextLeaguePriority=0;
			for($i=$THIS_LEAGUE_PRIORITY;$i<=999999;$i++){
					$nextPR = $i+1;
					$this->db->from("slider");
					$this->db->where("priority", $nextPR); 
					$data['seasons'] = $this->db->get()->result_array();
						foreach ($data['seasons'] as $newseasons):
							$nextLeaguePriority = $newseasons['priority'];
							$nextLeagueId = $newseasons['id'];
							$findLeague++;

						endforeach;
						if($findLeague!=0){break;}
			}
			$THIS_LEAGUE['priority'] = $nextLeaguePriority;
			$this->db->where('id', $ID);
			$this->db->update('slider',$THIS_LEAGUE);
			
			
			$UP_LEAGUE['priority'] = $THIS_LEAGUE_PRIORITY;
			$this->db->where('id', $nextLeagueId);
			$this->db->update('slider',$UP_LEAGUE);
			
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
/* END arrow slider*/


}
