<?php

$session_id = $this->session->userdata('username');
//echo $session_id;
if($session_id){
	echo "

				<script language='JavaScript' type='text/javascript'>

				

						<!-- 

						function GoNah(){ 

						 location='".site_url("admin/controlpanel/")."'; 

						} 

						setTimeout( 'GoNah()', 100 ); 

						//--> 

						</script>	

				";die;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>JanDitor / Админпанель </title>
	
    
<link href="<?php echo site_url();?>adminpanel/bootstrap.css" rel="stylesheet">
<link href="<?php echo site_url();?>adminpanel/site.css" rel="stylesheet"> 
    
    
	<link href="<?php echo site_url();?>adminpanel/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>

</head>
<body>

<div class="wrap">
<nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation">
<div class="container"><div class="navbar-header"><a class="navbar-brand" href="<?php echo site_url();?>">Административная панель сайта "JanDitor"</a></div></div></nav>

<div class="container">
<img src="<?php echo site_url();?>resources/img/logo.png" style="    float: left;">

<div class="site-login">
<!-- <a style=" margin: 0 auto;  display: block;  text-align: left;">	<img src="<?php echo site_url();?>images/logo77.jpg" style="  "></a> -->

    <p ><a style=" margin: 0 auto;  display: block;  text-align: left; color:#FFFFFF;">
    Проверьте, пожалуйста, вашу электронную почту.</p></a>
    

    <div class="row">
    
    
    
    
        <div class="col-lg-5">
		
<?php 
					$attributes = array( 'id' => 'login-form', 'name' => 'admin-form');
					echo form_open('admin/',$attributes); 
				?>
<input type="hidden" name="_csrf" >                
<div class="form-group field-loginform-email required has-success">
<label class="control-label" for="loginform-email">На адрес <?php echo $email; ?> было выслано письмо с новым паролем к вашему аккаунту.</label>

<div class="help-block"></div>
</div>                              

           

<div class="form-group">
<button type="submit" class="btn btn-primary" name="login-button">Войти</button>                
</div>
        </form>        
            
            
            
            
            
            </div>
    </div>
</div>
		</div>
	</div>
    
<footer class="footer">
<div class="container">
<p class="pull-left">© JanDitor 2017</p>
<p class="pull-right">Powered by <a href="http://www.netinfo.md/" rel="external">NetInfo</a></p>
</div>
</footer>    
    

</body>
</html>
