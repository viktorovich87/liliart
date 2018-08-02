<!DOCTYPE HTML>
<html>
<head>
<title>Интернет магазин</title>
<link href="<?php echo site_url();?>resources/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="<?php echo site_url();?>resources/js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="<?php echo site_url();?>resources/css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="#" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="<?php echo site_url();?>resources/css/etalage.css">
<script src="<?php echo site_url();?>resources/js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
<?php
$sessionID = $this->session->userdata('sessionID');
if(!isset($sessionID) or $sessionID=="" or empty($sessionID)){
$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
$max=25; 
$size=StrLen($chars)-1; 
$password=null; 

    while($max--) 
    $password.=$chars[rand(0,$size)]; 

$newdata = array(
                   'sessionID'  => $password,
                   'logged_in' => TRUE
               );

    $this->session->set_userdata($newdata);
  
}
//echo $sessionID;
?> 
		
		
<!-- start menu -->
<link href="<?php echo site_url();?>resources/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo site_url();?>resources/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="<?php echo site_url();?>resources/js/menu_jquery.js"></script>
<script src="<?php echo site_url();?>resources/js/simpleCart.min.js"> </script>


</head>
<body>
<!-- header_top -->
<div class="top_bg">
	<div class="container">
		<div class="header_top">
			<div class="top_right">
				<ul>
					<li><a href="<?php echo site_url();?>help">Помощь</a></li>|
					<li><a href="<?php echo site_url();?>contacts">Контакты</a></li>|
					<li><a href="<?php echo site_url();?>deliver">Доставка</a></li>
				</ul>
			</div>
			<div class="top_left">
				<h2><span></span> Позвоните нам : +373 123 456</h2>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- header -->
<div class="header_bg">
<div class="container">
	<div class="header">
	<div class="head-t">
		<div class="logo">
			<a href="<?php echo site_url();?>"><img src="<?php echo site_url();?>resources/images/logo.png" class="img-responsive" alt=""/> </a>
		</div>
		<?php 	 $loggedUserID = $this->session->userdata('loggedUserID'); ?>
		<!-- start header_right -->
		<div class="header_right" <?php if (!$loggedUserID) { ?>style="width:40%;"<? } ?>>
			<div class="rgt-bottom">
			
			<?php
		
			if ($loggedUserID) {

			
             $this->db->from("users");
             $this->db->where("user_id",$loggedUserID);
            $users['users'] = $this->db->get()->result_array();

            foreach ($users['users'] as $newusers):
                $NAME = $newusers['user_name'];
            endforeach;


          
            ?>
     
		
		<div class="log" >
					<div class="login" >
						<span class="enter-box" style="    font-size: 17px;"> Вы вошли как - <b><?php echo $NAME;?><br>
						(<a href="<?php echo site_url();?>main/myPage">Моя страница </a> | <a href="<?php echo site_url();?>main/myOptions">Настройки</a>)
          <a href="<?php echo site_url();?>main/exitt">
            <img src="<?php echo site_url();?>resources/images/exit.png" style="width: 20px;background: #000;" alt="" title="Выйти"/>
        </a>
					</div>
				</div>
				
		

				<?php
				
			}else{
				?>
				
				<div class="log" >
					<div class="login" >
						<div id="loginContainer"><a href="#" id="loginButton"><span>Вход</span></a>
						    <div id="loginBox">                
						        <?php 
								$attributes = array('class' => 'loginForm', 'id' => 'loginForm');
								echo form_open('main/enterCab/', $attributes);?>
						                <fieldset id="body">
						                	<fieldset>
						                          <label for="email">Email </label>
						                          <input type="text" name="email" id="email">
						                    </fieldset>
						                    <fieldset>
						                            <label for="password">Пароль</label>
						                            <input type="password" name="pass" id="password">
						                     </fieldset>
											
						                    <input type="button" id="login" value="Войти">
						                	<span><a href="#">Забыли пароль?</a></span>
						            	</fieldset>
						            
									<img src="<?php echo site_url();?>/resources/images/spinner.gif" class="spinner" id="spinner">
									<div id="error-box"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="reg">
					<a href="<?php echo site_url();?>register">Регистрация</a>
				</div>
			<?php } ?>
			<?php 
			$SUMM_PRICE =0;
				$COUNT =0;
			if($sessionID){
				$this->db->from("cart");
				$this->db->where("sessionID",$sessionID);
				$getCartProducts['getCartProducts'] = $this->db->get()->result_array();
				foreach ($getCartProducts['getCartProducts'] as $newgetCartProducts):
					$SUMM_PRICE = $newgetCartProducts['price']*$newgetCartProducts['count'] + $SUMM_PRICE;	
					$COUNT++;
				endforeach;
			}
				
				
			?>	
				
			<div class="cart box_1" id="cart">
				  
		  <a href="<?php echo site_url();?>checkout">
					<h3><?php echo $SUMM_PRICE;?> лей. (<span  class=""><?php echo $COUNT;?> шт.</span> )
					<img src="<?php echo site_url();?>resources/images/bag.png" alt=""></h3>
				</a>	
			
				<div class="clearfix"> </div>
			</div>
			<div class="create_btn">
				<a href="<?php echo site_url();?>checkout">Корзина</a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="search">
		    <form>
		    	<input type="text" value="" placeholder="поиск по сайту...">
				<input type="submit" value="">
			</form>
		</div>
		<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
		<?php  $this->load->view('menu'); ?>	
	</div>
</div>
</div>