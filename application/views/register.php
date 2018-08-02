<?php  $this->load->view('header'); 

 $loggedUserID = $this->session->userdata('loggedUserID'); 
 if ($loggedUserID) {
	 header('Location: '.site_url());
 }
 ?>	
<!-- content -->
<div class="container">
<div class="main">
	<!-- start registration -->
	<div class="registration">
		<div class="registration_left">
		<h2>Новый пользователь?</h2>
		<!-- [if IE] 
		    < link rel='stylesheet' type='text/css' href='ie.css'/>  
		 [endif] -->  
		  
		<!-- [if lt IE 7]>  
		    < link rel='stylesheet' type='text/css' href='ie6.css'/>  
		<! [endif] -->  
		<script>
			(function() {
		
			// Create input element for testing
			var inputs = document.createElement('input');
			
			// Create the supports object
			var supports = {};
			
			supports.autofocus   = 'autofocus' in inputs;
			supports.required    = 'required' in inputs;
			supports.placeholder = 'placeholder' in inputs;
		
			// Fallback for autofocus attribute
			if(!supports.autofocus) {
				
			}
			
			// Fallback for required attribute
			if(!supports.required) {
				
			}
		
			// Fallback for placeholder attribute
			if(!supports.placeholder) {
				
			}
			
			// Change text inside send button on submit
			var send = document.getElementById('register-submit');
			if(send) {
				send.onclick = function () {
					this.innerHTML = '...Sending';
				}
			}
		
		})();
		</script>
		 <div class="registration_form">
		 <!-- Form -->
			<?php echo form_open('main/register/');?>
				<div>
					<label>
						<input placeholder="Ваше имя" type="text" name="name" tabindex="1" required autofocus>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Ваш email:" type="email" name="email" tabindex="3" required>
					</label>
				</div>
				
				<div class="sky-form">
					<div class="sky_form1">
						<ul>
							<li><label class="radio left"><input type="radio" name="gender" value="male" checked=""><i></i>Муж</label></li>
							<li><label class="radio"><input type="radio" name="gender" value="female"><i></i>Жен</label></li>
							<div class="clearfix"></div>
						</ul>
					</div>
				</div>
				<div>
					<label>
						<input placeholder="Пароль" type="password"  name="pass" tabindex="4" required>
					</label>
				</div>						
				<div>
					<label>
						<input placeholder="Пароль ещё раз" type="password"  name="spass" tabindex="4" required>
					</label>
				</div>	
				<div>
					<input type="submit" value="Создать учетную запись" id="register-submit">
				</div>
				<div class="sky-form" style="display:none;">
					<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Я согласен с условиями&nbsp;<a class="terms" href="#"> Правилами пользования</a> </label>
				</div>
			</form>
			<!-- /Form -->
		</div>
	</div>
	<div class="registration_left">
		<h2>Уже зарегистрированы?</h2>
		 <div class="registration_form">
		 <!-- Form -->
			<form id="registration_form" action="contact.php" method="post">
				<div>
					<label>
						<input placeholder="Email:" type="email" tabindex="3" required>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Пароль" type="password" tabindex="4" required>
					</label>
				</div>						
				<div>
					<input type="submit" value="Войти" id="register-submit">
				</div>
				<div class="forget">
					<a href="#">Забыли пароль?</a>
				</div>
			</form>
			<!-- /Form -->
			</div>
	</div>
	<div class="clearfix"></div>
	</div>
	<!-- end registration -->
</div>
</div>
<?php  $this->load->view('footer'); ?>	